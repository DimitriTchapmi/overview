#!/bin/bash

entreprise=`echo $1 | cut -d _ -f1`
machine=`echo $1 | cut -d _ -f2`

sudo /var/www/overview/code/scripts/scripts_dimi/init_arbre_pc.sh $entreprise $machine
sudo /var/www/overview/code/scripts/scripts_dimi/traitement_inv.sh $1

