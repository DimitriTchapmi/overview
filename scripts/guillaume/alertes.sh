#!/bin/bash

# $1 fichier $2 item $3 nom item $4 valeur

entreprise=`echo $1 | cut -d _ -f1`
machine=`echo $1 | cut -d _ -f2`

ligne=`cat /var/www/overview/projets/$entreprise/supervision/$machine`

$nom_item=`echo $ligne | cut -d : -f 1`
$seuil=`echo $ligne | cut -d : -f 2`
$battement=`echo $ligne | cut -d : -f 3`
$temps_atteint=`echo $ligne | cut -d : -f 4`
$temps_redescendu=`echo $ligne | cut -d : -f 5`
$flag=`echo $ligne | cut -d : -f 6`