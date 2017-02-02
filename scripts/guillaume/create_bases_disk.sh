#!/bin/bash

# script appelé avec nom entreprise, nom machine, nom du disque et noms partitions

entreprise=$1
machine=$2

cd /var/www/overview/projets/$entreprise/supervision/$machine/bases
if [ ! -e carte_$3".rrd" ]
then

commande="rrdtool create disque_$3.rrd --step 60" 


i=0
for param in $@
do
  tab_param[$i]=$param
  let "i++"
done
unset tab_param[0]
unset tab_param[1]
unset tab_param[2]

for elem in ${tab_param[@]}
do
  commande="$commande DS:$elem""_free:GAUGE:180:U:U RRA:AVERAGE:0.5:1:1440 RRA:AVERAGE:0.5:15:672 RRA:AVERAGE:0.5:60:744
  DS:$elem""_used:GAUGE:180:U:U RRA:AVERAGE:0.5:1:1440 RRA:AVERAGE:0.5:15:672 RRA:AVERAGE:0.5:60:744"

done

eval $commande

else
echo "Cette base existe déjà"
fi
