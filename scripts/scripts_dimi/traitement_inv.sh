#!/bin/bash
chemin_epse="/var/projets"
ip_pc=`sudo echo $1 | cut -d "_" -f 2`
nom_epse=`sudo echo $1 | cut -d "_" -f 1`
sudo echo "ip=$ip_pc"
sudo echo "epse=$nom_epse"
sudo mv /home/transfert/nouveau/$1 $chemin_epse/$nom_epse/inventaire/default/$ip_pc
sudo sed -i 's/^ *//' $chemin_epse/$nom_epse/inventaire/default/$ip_pc 
sudo cat $ip_pc_$nom_epse | grep ^Vendor | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/bios.txt

