#!/bin/bash
choix_epse="epse"
choix_pc="pc"
test=""
choix_action="0"
nbr_ligne=1
chemin_epse="/var/projets"
sudo echo "        **********IHM-Shell**********"
#selection d'epse
sudo echo "*)Choisissez une entreprise... "
for file in `ls $chemin_epse`
do
    sudo echo "$nbr_ligne.$file "
	let "nbr_ligne=nbr_ligne+1"
done
while [ ! -d $chemin_epse/$choix_epse  ]
do
	sudo echo "Entrez le nom de l'entreprise : "
	read choix_epse
done
sudo echo " choix = $choix_epse"
#selection de machine
sudo echo "*)Choisissez une machine chez <<$choix_epse>>... "
sudo ls | nl $chemin_epse/$choix_epse/inventaire/lien_pc_group.txt

while [ "$test" == "" ]
do
	sudo echo "Entrez l'adresse IP de la machine : "
        read choix_pc
	test=`sed -n /''$choix_pc' '/p $chemin_epse/$choix_epse/inventaire/lien_pc_group.txt`
done
sudo echo " choix = $choix_pc"
#Choix de l'action
sudo echo "*)Que voulez vous faire ? "
sudo echo "1. Changer le groupe de la machine "
sudo echo "2. Supprimer la machine "
while [ "$choix_action" -ne 1 ] && [ "$choix_action" -ne 2 ]
do
