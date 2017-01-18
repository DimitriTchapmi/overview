#!/bin/bash

# Fichier appelé lors de l'arrivée d'un nouveau fichier dans /home/transfert/supervision avec le nom du fichier

entreprise=`echo $1 | cut -d _ -f1`
machine=`echo $1 | cut -d _ -f2`

valeur=`cat $1 | grep Memoire | cut -d : -f 2`

rrdtool update /var/projects/$entreprise/supervision/$machine/bases/ram.rrd N:$valeur

