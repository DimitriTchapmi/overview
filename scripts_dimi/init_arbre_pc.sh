#!/bin/bash

nom_epse=$1
ip_pc=$2
chemin_epse="/var/projets"

###création du dossier inventaire###
sudo mkdir $chemin_epse/$nom_epse/inventaire/default/$ip_pc

###création du dossier supervision###
sudo mkdir -p $chemin_epse/$nom_epse/supervision/$ip_pc/graphes/jours
sudo mkdir $chemin_epse/$nom_epse/supervision/$ip_pc/graphes/heures
sudo mkdir $chemin_epse/$nom_epse/supervision/$ip_pc/graphes/semaines
sudo mkdir $chemin_epse/$nom_epse/supervision/$ip_pc/processus/
sudo mkdir $chemin_epse/$nom_epse/supervision/$ip_pc/alertes/

