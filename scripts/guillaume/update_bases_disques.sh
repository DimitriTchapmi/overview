#!/bin/bash
# Fichier appelé lors de l'arrivée d'un nouveau fichier dans /home/transfert/supervision avec le nom du fichier


commande() # #1 fichier #2 nom disque
{
  noms_partitions=`cat /home/transfert/test_su/$1 | grep total_part_$2 | cut -d _ -f 3`
  i=0
  for part in $noms_partitions
  do
    total=`cat /home/transfert/test_su/$1 | grep total_part"_"$part | cut -d : -f 2 | cut -d G -f 1`
    used=`cat /home/transfert/test_su/$1 | grep utilisé_part"_"$part | cut -d : -f 2 | cut -d G -f 1`
    free=`echo $total - $used|bc -l`
    commande="$commande$part"_used:"$part"_free:""
    valeurs[$i]=$used
    let "i++"
    valeurs[$i]=$free
    let "i++"
  done
 commande=${commande::-1}
 commande=$commande" N:" 
  for val in ${valeurs[@]}
   do
    commande="$commande$val":""
   done
  commande=${commande::-1}
  echo $commande
}

entreprise=`echo $1 | cut -d _ -f1`
machine=`echo $1 | cut -d _ -f2`

noms_disques=`cat /home/transfert/test_su/$1 | grep disque | cut -d _ -f 2 | cut -d : -f 1`

i=0
for nom in $noms_disques
do
  commande_finale="rrdtool update /var/www/overview/projets/$entreprise/supervision/$machine/bases/disque_$nom".rrd" -t "
  commande_finale=$commande_finale$(commande $1 $nom)
  exec $commande_finale
  let "i++"
done

