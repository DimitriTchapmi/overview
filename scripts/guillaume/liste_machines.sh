#!/bin/bash

# Fichier appelé toutes les minutes heures ... avec le nm de secondes

for entreprise in `ls /var/www/overview/projets`
do
  for machine in `ls /var/www/overview/projets/$entreprise/supervision`
  do
sudo /var/www/overview/code/scripts/guillaume/graphe_ram.sh $1 $entreprise $machine
sudo /var/www/overview/code/scripts/guillaume/graphe_cpu.sh $1 $entreprise $machine
sudo /var/www/overview/code/scripts/guillaume/graphe_cartes.sh $1 $entreprise $machine
sudo /var/www/overview/code/scripts/guillaume/graphe_disques.sh $1 $entreprise $machine
  done
done

