#!/bin/bash

nom_epse=$1
ip_pc=$2
group_pc=$3
chemin_epse="/var/projets"

###suppression du dossier inventaire###
sudo rm -r $chemin_epse/$nom_epse/inventaire/$group_pc/$ip_pc
sudo sed -i "/$ip_pc/d" $chemin_epse/$nom_epse/inventaire/lien_pc_group.txt

###suppression du dossier supervision###
sudo rm -r $chemin_epse/$nom_epse/supervision/$ip_pc
