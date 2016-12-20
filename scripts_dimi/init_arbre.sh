#!/bin/bash

nom_epse=$1
ip_pc=$2
group_pc=${3-default}

chemin_epse="/var/projets"

sudo echo $group_pc
###création du dossier inventaire###
sudo mkdir -p $chemin_epse/$nom_epse/inventaire/$group_pc/$ip_pc

###création du dossier supervision###
sudo mkdir -p $chemin_epse/$nom_epse/supervision/$ip_pc/bases/

sudo mkdir -p $chemin_epse/$nom_epse/supervision/$ip_pc/graphes/jours
sudo mkdir $chemin_epse/$nom_epse/supervision/$ip_pc/graphes/heures
sudo mkdir $chemin_epse/$nom_epse/supervision/$ip_pc/graphes/semaines

sudo mkdir $chemin_epse/$nom_epse/supervision/$ip_pc/processus/

sudo mkdir $chemin_epse/$nom_epse/supervision/$ip_pc/alertes/
