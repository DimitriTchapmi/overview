#!/bin/bash

# script appelé avec nom fichier, nom du disque et noms partitions

entreprise=`echo $1 | cut -d _ -f1`
machine=`echo $1 | cut -d _ -f2`

cd /var/projects/$entreprise/supervision/$machine/bases
if [ ! -e carte_$2".rrd" ]
then

commande="rrdtool create disque_$2.rrd --step 60" 


i=0
for param in $@
do
  tab_param[$i]=$param
  let "i++"
done
unset tab_param[0]
unset tab_param[1]

for elem in ${tab_param[@]}
do
  commande="$commande DS:$elem""_free:GAUGE:120:U:U RRA:AVERAGE:0.5:1:1440 RRA:AVERAGE:0.5:15:672 RRA:AVERAGE:0.5:4:744
  DS:$elem""_used:GAUGE:120:U:U RRA:AVERAGE:0.5:1:1440 RRA:AVERAGE:0.5:15:672 RRA:AVERAGE:0.5:4:744"

done

eval $commande

else
echo "Cette base existe déjà"
fi
