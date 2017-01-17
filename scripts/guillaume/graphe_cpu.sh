#!/bin/bash

# Script pour créer le graphe des cpu d'une machine. Appelé avec un nombre de secondes, le nom de l'entreprise et celui de la machine


  for cpu in `ls /var/www/overview/projets/$2/supervision/$3/bases | grep cpu | cut -d _ -f 2 | cut -d . -f 1`
  do
   rrdtool graph /var/www/overview/projets/$2/supervision/$3/graphes/cpu_$cpu.png --start -$1 --vertical-label pourcent DEF:utilisation=/var/www/overview/projets/$2/supervision/$3/bases/cpu_$cpu.rrd:cpu:AVERAGE LINE1:utilisation\#0000FF:"utilisation du cpu_$cpu"
  done
