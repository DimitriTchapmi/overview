#!/bin/bash
nom_epse=$1
ip_pc=$2
group_pc=$3
chemin_epse="/var/www/overview/projets"

if [ ! -d "$chemin_epse/$nom_epse/inventaire/default/$ip_pc" ]; then
	 sudo echo "***Erreur, La machine $ip_pc n'existe pas chez <<$nom_epse>> ***"
elif [ -d "$chemin_epse/$nom_epse/inventaire/$group_pc/$ip_pc" ]; then
	sudo echo "***Erreur, La machine $ip_pc existe déjà dans le groupe $group_src!***"
else
#On vérifie si le groupe($group_pc) existe déjà avant de copier le dossier du pc($ip_pc)
#la commande crée le groupe s'il n'existe pas encore
	sudo test -d $chemin_epse/$nom_epse/inventaire/$group_pc/ || sudo mkdir -p $chemin_epse/$nom_epse/inventaire/$group_pc/ && sudo mv $chemin_epse/$nom_epse/inventaire/default/$ip_pc $chemin_epse/$nom_epse/inventaire/$group_pc/
	sudo echo "$ip_pc $group_pc" >> $chemin_epse/$nom_epse/inventaire/lien_pc_group.txt
fi
