#!/bin/bash

nom_epse=$1
ip_pc=$2
group_src=$3
group_dst=$4
chemin_epse="/var/projets"

if [ ! -d "$chemin_epse/$nom_epse/inventaire/$group_dst" ]; then
	sudo echo "***Erreur, Le groupe de destination n'existe pas !*** "
elif [ ! -d "$chemin_epse/$nom_epse/inventaire/$group_src" ]; then
        sudo echo "***Erreur, Le groupe source n'existe pas !*** "
elif [ ! -d "$chemin_epse/$nom_epse/inventaire/$group_src/$ip_pc" ]; then
	sudo echo "***Erreur, La machine $ip_pc n'existe pas dans le groupe $group_src!***"
else 
	sudo mv $chemin_epse/$nom_epse/inventaire/$group_src/$ip_pc $chemin_epse/$nom_epse/inventaire/$group_dst/
	sudo sed -i "s/$ip_pc $group_src/$ip_pc $group_dst/g" "$chemin_epse/$nom_epse/inventaire/lien_pc_group.txt"
fi
