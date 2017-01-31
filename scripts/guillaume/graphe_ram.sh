#!/bin/bash

# Script pour créer le graph de la ram pour toutes les machines de toutes les entreprises. Appelé avec un nombre de secondes


entreprise=$2
machine=$3
    
    rrdtool graph /var/www/overview/projets/$entreprise/supervision/$machine/graphes/ram_$1.png --start -$1 --vertical-label pourcent DEF:ram=/var/www/overview/projets/$entreprise/supervision/$machine/bases/ram.rrd:ram:AVERAGE LINE1:ram\#0000FF:'utilisation de la ram'
  #  echo "Commande finale : "$test
