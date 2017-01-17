#!/bin/bash
chemin_epse="/var/www/overview/projets"
nom_epse=$1
ip_pc=$2
nom_param=$3
pourcentage_limite=$4
duree_limite=$5

if [[ -e $chemin_epse/$nom_epse/supervision/$ip_pc/alertes/alertes ]]; then
	sudo echo "$nom_param:$pourcentage_limite:$duree_limite" >> $chemin_epse/$nom_epse/supervision/$ip_pc/alertes/alertes
else
	sudo echo "$nom_param:$pourcentage_limite:$duree_limite" > $chemin_epse/$nom_epse/supervision/$ip_pc/alertes/alertes
fi

