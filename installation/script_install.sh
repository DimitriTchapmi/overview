#!/bin/bash

# L'utilisateur doit exécuter en root ce sript avec comme argument le nom de son entreprise


if [ ! -d /etc/overview ]
then
        echo "Création du dossier /etc/overview et copie des fichiers"
        mkdir /etc/overview
else
        echo "Le répertoire /etc/overview existe déjà !"
        exit
fi

mv -t /etc/overview supervision.sh inventaire.sh id_rsa

cd /etc/overview
chmod 700 supervision.sh inventaire.sh
touch ip
touch entreprise
entreprise=$1
ip=`hostname -I`
echo $ip > ip
echo $entreprise > entreprise

echo "Vérification des paquets nécessaires"
dependances=(lshw vnstat lsof bc)
for elem in ${dependances[@]}
do
    check=`dpkg -l | grep $elem | cut -d " " -f1`
    echo $check
    if [ "$check" == "" ]
then
        echo "Installation du paquet $elem"
        apt-get install $elem
    fi
done

echo "Edition du crontab"
touch /etc/cron.d/overview
echo "# Execution du script supervision toutes les minutes" > /etc/cron.d/overview
echo "*/1 * * * * root /etc/overview/supervision.sh" > /etc/cron.d/overview

./inventaire.sh
