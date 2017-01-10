#!/bin/bash

#Fichier appelé par un script de l'inventaire avec le nom de l'entreprise et de la machine


entreprise=$1
machine=$2

cd /var/www/overview/projets/$entreprise/supervision/$machine/bases

if [ ! -e ram.rrd ]
then
rrdtool create ram.rrd --step 60 DS:ram:GAUGE:120:U:U RRA:AVERAGE:0.5:1:1440 RRA:AVERAGE:0.5:15:672 RRA:AVERAGE:0.5:4:744
else
echo "Cette base existe déjà"
fi
