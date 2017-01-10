#!/bin/bash

nom_epse=$1
group_pc=$2
chemin_epse="/var/www/overview/projets"

if [ -d $chemin_epse/$nom_epse/inventaire/$group_pc ]; then
  sudo echo "Ce groupe a déjà été crée"
else 
  sudo mkdir $chemin_epse/$nom_epse/inventaire/$group_pc
fi
