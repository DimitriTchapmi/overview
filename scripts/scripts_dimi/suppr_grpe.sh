#!/bin/bash

nom_epse=$1
group_pc=$2
chemin_epse="/var/projets"

if [ ! -d $chemin_epse/$nom_epse/inventaire/$group_pc ]; then
  sudo echo "Ce groupe n'existe pas ! "
elif [ "$(ls -A $chemin_epse/$nom_epse/inventaire/$group_pc)" ]; then
        sudo echo "Ce groupe contient encore des machines !/\nVoulez vous tout supprimer ? oui/non"
        read confirmation
	if [ "$confirmation" == "oui" ]; then
		sudo rm -r $chemin_epse/$nom_epse/inventaire/$group_pc
		sudo sed -i "/$group_pc/d" $chemin_epse/$nom_epse/inventaire/lien_pc_group.txt
		sudo echo " ***Suppression effectuée avec succès***"
	elif [ "$confirmation" == "non" ]; then
		sudo echo " ***Suppression annulée*** "
	fi
else
  	sudo rm -r $chemin_epse/$nom_epse/inventaire/$group_pc
    	sudo sed -i "/$group_pc/d" $chemin_epse/$nom_epse/inventaire/lien_pc_group.txt
	sudo echo "***Suppression effectuée avec succès***"
fi
