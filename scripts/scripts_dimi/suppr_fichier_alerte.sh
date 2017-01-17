#!/bin/bash
chemin_epse="/var/www/overview/projets"
nom_epse=$1
ip_pc=$2
nom_param=$3

sudo sed -i "/$nom_param/d" $chemin_epse/$nom_epse/supervision/$ip_pc/alertes/alertes
