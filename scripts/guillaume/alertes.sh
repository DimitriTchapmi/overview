#!/bin/bash

# $1 fichier $2 item $3 nom item $4 valeur

entreprise=`echo $1 | cut -d _ -f1`
machine=`echo $1 | cut -d _ -f2`

ligne=`cat /var/www/overview/projets/$entreprise/supervision/$machine/alerte | grep $2$3`
num_ligne=`cat /var/www/overview/projets/$entreprise/supervision/$machine/alerte | grep $2$3 | cut -d : -f 1`

nom_item=`echo $ligne | cut -d : -f 1`
seuil=`echo $ligne | cut -d : -f 2`
battement=`echo $ligne | cut -d : -f 3`
temps_atteint=`echo $ligne | cut -d : -f 4`
temps_redescendu=`echo $ligne | cut -d : -f 5`
flag=`echo $ligne | cut -d : -f 6`

if [ $flag -eq 1 ] # si alerte déjà déclenchée
	then
	if [ $4 -lt $seuil ] # si la valeur est en dessous du seuil
	 then
	 let "temps_redescendu++"
        else
          let "temps_redescendu=0"
        fi   
        if [ $temps_redescendu -eq $battement ] # si plusieurs valeurs sont en dessous du seuil, on désactive l'alerte
     	then
     		let "temps_atteint=0"
     		let "temps_redescendu=0"
     		let "flag=0"
     fi
else # l'alerte n'est pas déclenchée
     if [ $4 -gt $seuil ] # valeur au dessus du seuil
     	then
         let "temps_atteint++"
         if [ $temps_atteint -eq $battement ] # si plusieurs valeurs au dessus de seuil, on déclenche l'alerte
            then
             let "flag=1"
         fi
    fi
fi
echo $nom_item $seuil $battement $temps_atteint $temps_redescendu $flag
sed -i "/^$2$3/ d" alerte
echo $nom_item:$seuil:$battement:$temps_atteint:$temps_redescendu:$flag >>alerte
