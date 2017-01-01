#!/bin/bash

# L'utilisateur doit décompresser l'archive overview.tar, exécuter en root ce sript avec comme argument le nom de son entreprise

mkdir /etc/overview
mv -t /etc/overview supervision.sh inventaire.sh
cd /etc/overview
touch ip
touch entreprise
entreprise=$1
ip=`hostname -I`
echo $ip > ip
echo $entreprise > entreprise
./inventaire.sh
# scp -i id_rsa entreprise_ip transfert@10.8.100.237:/home/transfert/nouveau
# mettre dans le crontab le script de supervision pour l'exécuter toutes les minutes
# mettre dans le crontab le script d'inventaire pour l'exécuter ?
