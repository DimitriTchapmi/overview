#!/bin/bash

# script appelé par un script de l'inventaire avec le nom de l'entreprise, celui de la machine et celui de la carte

entreprise=$1
machine=$2

cd /var/www/overview/projets/$entreprise/supervision/$machine/bases

if [ ! -e carte_$2".rrd" ]
then
rrdtool create "carte_""$3".rrd --step 60 DS:inbps:GAUGE:180:U:U RRA:AVERAGE:0.5:1:1440 RRA:AVERAGE:0.5:15:672 RRA:AVERAGE:0.5:60:744 DS:outbps:GAUGE:180:U:U RRA:AVERAGE:0.5:1:1440 RRA:AVERAGE:0.5:15:672 RRA:AVERAGE:0.5:60:744
else
echo "Cette base existe déjà" 
fi
