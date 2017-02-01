#!/bin/bash

# script appelé avec nom entreprise, nom machine et nom (numéro) du cpu

entreprise=$1
machine=$2

cd /var/www/overview/projets/$entreprise/supervision/$machine/bases

if [ ! -e cpu_$3".rrd" ]
then
rrdtool create "cpu_""$3".rrd --step 60 DS:cpu:GAUGE:120:U:U RRA:AVERAGE:0.5:1:1440 RRA:AVERAGE:0.5:15:672 RRA:AVERAGE:0.5:4:744
else
echo "Cette base existe déjà"
fi
