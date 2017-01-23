#!/bin/bash

nom_epse=$1
ip_pc=$2
id_epse_bdd=$3
chemin_epse="/var/www/overview/projets"

###création du dossier inventaire###
sudo mkdir $chemin_epse/$nom_epse/inventaire/default/$ip_pc

###création du dossier supervision###
sudo mkdir -p $chemin_epse/$nom_epse/supervision/$ip_pc/graphes/jours
sudo mkdir $chemin_epse/$nom_epse/supervision/$ip_pc/graphes/heures
sudo mkdir $chemin_epse/$nom_epse/supervision/$ip_pc/graphes/semaines
sudo mkdir $chemin_epse/$nom_epse/supervision/$ip_pc/processus/
sudo mkdir $chemin_epse/$nom_epse/supervision/$ip_pc/alertes/
sudo mkdir $chemin_epse/$nom_epse/supervision/$ip_pc/bases/
###création du fichier lien pc_group
sudo echo "$ip_pc default" > $chemin_epse/$nom_epse/inventaire/lien_pc_group.txt

### Ajout machine dans bdd
mysql --user='root' --password='overview' << EOF
CONNECT overview;
INSERT INTO machines (nom, entreprise, groupe) VALUES("$ip_pc", $id_epse_bdd, "default");
EOF
