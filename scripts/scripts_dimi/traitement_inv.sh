#!/bin/bash
chemin_epse="/var/projets"
ip_pc=`sudo echo $1 | cut -d "_" -f 2`
nom_epse=`sudo echo $1 | cut -d "_" -f 1`
sudo echo "ip=$ip_pc"
sudo echo "epse=$nom_epse"
sudo cp /home/transfert/nouveau/$1 $chemin_epse/$nom_epse/inventaire/default/$ip_pc/
sudo sed -i 's/^ *//' $chemin_epse/$nom_epse/inventaire/default/$ip_pc/$1
#marque_bios
sudo cat $1 | grep ^Vendor | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/marque_bios.txt
#ReleaseDate_bios
sudo cat $1 | grep ^ReleaseDate | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/releasedate_bios.txt
#version_bios
sudo cat $1 | grep ^Version | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/version_bios.txt
#Manufacturer
sudo cat $1 | grep ^Manufacturer | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/manufacturer.txt
#ProductName
sudo cat $1 | grep ^ProductName | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/productname.txt
#SerialNumber
sudo cat $1 | grep ^SerialNumber | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/serialnumber.txt
#cpu_family
sudo cat $1 | grep ^"cpu family" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/cpu_family.txt
#cpu_MHz
sudo cat $1 | grep ^"cpu MHz" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/cpu_frequency.txt
#cpu cores
sudo cat $1 | grep ^"cpu cores" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/cpu_cores.txt
#cpuid level
sudo cat $1 | grep ^"cpuid level" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/cpuid_level.txt
#model cpu
sudo cat $1 | grep ^"model" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/model_cpu.txt
#model name 
sudo cat $1 | grep ^"model name" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/model_cpu_name.txt
#cpu flags 
sudo cat $1 | grep ^"flags" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/cpu_flags.txt
#cpu type 64b or 32b
sudo cat $1 | grep ^"width" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/cpu_type.txt
#Ram
sudo cat $1 | grep ^"Size" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/ram_taille.txt
#Nombre se slot de RAM
sudo cat $1 | grep ^"NumberOfDevices" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/ram_number_of_devices.txt
#type de carte RX
