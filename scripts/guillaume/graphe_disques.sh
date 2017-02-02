#!/bin/bash

# Script pour créer le graph des disques d'une machine. Appelé avec un nombre de secondes, le nom de l'entreprise et celui de la machine

l_couleurs=(FF3333 FF6A33 3733FF 33B7FF 465C2B 8CFF00 4403FB FB0391)      # rouge, bleu, vert, violet 

  for disque in `ls /var/www/overview/projets/$2/supervision/$3/bases | grep disque | cut -d _ -f 2 | cut -d . -f 1`
  do
   commande="rrdtool graph /var/www/overview/projets/$2/supervision/$3/graphes/disque_$disque"_"$1.png --start -$1 --vertical-label mb"

  i=0
  j=1
  for partition in `rrdtool info /var/www/overview/projets/$2/supervision/$3/bases/disque_$disque.rrd | grep index | grep free | cut -d [ -f 2 | cut -d ] -f 1 | cut -d _ -f 1`
  do
    couleur_a=${l_couleurs[$i]}
    couleur_b=${l_couleurs[$j]}
    commande="$commande DEF:$partition""_used=/var/www/overview/projets/$2/supervision/$3/bases/disque_$disque.rrd:$partition""_used:AVERAGE AREA:$partition""_used#$couleur_a:'espace utilisé sur la partition $partition':STACK DEF:$partition""_free=/var/www/overview/projets/$2/supervision/$3/bases/disque_$disque.rrd:$partition""_free:AVERAGE AREA:$partition""_free#$couleur_b:'espace libre sur la partition $partition':STACK"
    let "i+=2"
    let "j+=2"
  done
done
echo $commande
