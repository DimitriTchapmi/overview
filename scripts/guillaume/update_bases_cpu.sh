#!/bin/bash

# Fichier appelé lors de l'arrivée d'un nouveau fichier dans /home/transfert/supervision avec le nom du fichier

entreprise=`echo $1 | cut -d _ -f1`
machine=`echo $1 | cut -d _ -f2`

noms=`cat /home/transfert/supervision/$1  | grep cpu | cut -d _ -f 2 | cut -d : -f 1`

valeurs=`cat /home/transfert/supervision/$1 | grep cpu | cut -d : -f 2`

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
sudo  rrdtool update /var/www/overview/projets/$entreprise/supervision/$machine/bases/cpu_$j.rrd N:${t_valeurs[$i]}
 let "i++"
done

