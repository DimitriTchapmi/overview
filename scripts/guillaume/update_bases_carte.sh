#!/bin/bash

# Fichier appelé lors de l'arrivée d'un nouveau fichier dans /home/transfert/supervision avec le nom du fichier

entreprise=`echo $1 | cut -d _ -f1`
machine=`echo $1 | cut -d _ -f2`

noms=`cat nb_items | grep carte | cut -d _ -f 2 | cut -d : -f 1`

valeurs=`cat nb_items | grep carte | cut -d : -f 2`

i=0
for nom in $noms
do
  t_noms[$i]=$nom
  let "i++"
done

let "i=0"
for valeur in $valeurs
do
  t_valeurs[$i]=$valeur
  let "i++"
done

let "i=0"
for j in "${t_noms[@]}"
do
 in=`echo ${t_valeurs[$i]} | cut -d , -f1`
 out=`echo ${t_valeurs[$i]} | cut -d , -f2`
 echo $in $out
 rrdtool update /var/projects/$entreprise/supervision/$machine/bases/carte_$j N:$in:$out
 let "i++"
done

