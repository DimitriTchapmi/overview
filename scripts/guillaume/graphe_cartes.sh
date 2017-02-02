#!/bin/bash

# Script pour créer le graph des cartes réseaux d'une machine. Appelé avec un nombre de secondes, le nom de l'entreprise et celui de la machine

  for carte in `ls /var/www/overview/projets/$2/supervision/$3/bases | grep carte | cut -d _ -f 2 | cut -d . -f 1`
  do
   rrdtool graph /var/www/overview/projets/$2/supervision/$3/graphes/carte_$carte"_"$1.png --start -$1 --vertical-label kbps DEF:inbps=/var/www/overview/projets/$2/supervision/$3/bases/carte_$carte.rrd:inbps:AVERAGE LINE1:inbps\#000FFF:"débit entrant sur la carte_$carte" DEF:outbps=/var/www/overview/projets/$2/supervision/$3/bases/carte_$carte.rrd:outbps:AVERAGE LINE2:outbps\#AC0ABF:"débit sortant sur la carte_$carte"
  done
