#!/bin/bash
choix_epse="epse"
choix_pc="pc"
choix_dst="dst"
test2=""
test=""
choix_action="0"
nbr_ligne=1
chemin_epse="/var/www/overview/projets"
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
	sudo echo "Entrez le choix : 1 ou 2"
	read choix_action
done
#appel des scripts conernés pour les actions
grpe_pc=`sudo cat $chemin_epse/$choix_epse/inventaire/lien_pc_group.txt | grep ^$choix_pc | cut -d " " -f 2`
case "$choix_action" in

1)
	while [ "$test2" == "" ]
	do
        	sudo echo "Choisissez le groupe de destination : "
        	read choix_dst
        	test2=`sed -n /' '$choix_dst/p $chemin_epse/$choix_epse/inventaire/lien_pc_group.txt`
	done
	sudo bash change_group_pc.sh $choix_epse $choix_pc $grpe_pc $choix_dst
	sudo echo "***Modification effectueé avec succès... "
;;
2)
	sudo bash suppr_pc.sh $choix_epse $choix_pc $grpe_pc
	sudo echo "***La machine a été supprimée... "
;;

esac
