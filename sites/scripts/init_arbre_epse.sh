#!/bin/bash

nom_epse=$1

chemin_epse="/var/www/overview/projets"

###création du dossier inventaire###
sudo mkdir -p $chemin_epse/$nom_epse/inventaire/default/

###création du dossier supervision###
sudo mkdir -p $chemin_epse/$nom_epse/supervision/

