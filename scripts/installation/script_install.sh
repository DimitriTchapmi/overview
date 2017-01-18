#!/bin/bash

# L'utilisateur doit décompresser l'archive overview.tar, exécuter en root ce sript avec comme argument le nom de son entreprise


if [ !-d /etc/overview ] then
	mkdir /etc/overview
else
	echo "Le répertoire /etc/overview existe déjà !"
fi

mv -t /etc/overview supervision.sh inventaire.sh

cd /etc/overview
chmod 700 supervision.sh inventaire.sh
touch ip
touch entreprise
entreprise=$1
ip=`hostname -I`
echo $ip > ip
echo $entreprise > entreprise

dependances=["lshw" "lsblk" "vnstat" "lsof"]
for elem in ${$dependances[@]} do
    check=`dpkg -l | grep $elem`
    if [ $check == "" ] then
    	echo "Installation du paquet $elem"
    	apt-get install $elem
    fi
done

touch /etc/cron.d/overview
echo "# Execution du script supervision toutes les minutes" > /etc/cron.d/overview
echo "*/1 * * * * root /etc/overview/test.sh" > /etc/cron.d/overview

./inventaire.sh
# scp -i id_rsa entreprise_ip transfert@10.8.100.237:/home/transfert/nouveau
# mettre dans le crontab le script de supervision pour l'exécuter toutes les minutes
# mettre dans le crontab le script d'inventaire pour l'exécuter ?
