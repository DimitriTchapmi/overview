#!/bin/bash
chemin_epse="/var/www/overview/projets"
ip_pc=`sudo echo $1 | cut -d "_" -f 2`
nom_epse=`sudo echo $1 | cut -d "_" -f 1`

sudo echo "ip=$ip_pc"
sudo echo "epse=$nom_epse"
sudo cp /home/transfert/nouveau/$1 $chemin_epse/$nom_epse/inventaire/default/$ip_pc/
sudo sed -i 's/^ *//' $chemin_epse/$nom_epse/inventaire/default/$ip_pc/$1
fichier="$chemin_epse/$nom_epse/inventaire/default/$ip_pc/$1"

sudo /var/www/overview/code/scripts/guillaume/create_bases_ram.sh $nom_epse $ip_pc
sudo /var/www/overview/code/scripts/guillaume/create_bases_cpu.sh $nom_epse $ip_pc 1

#marque_bios
sudo cat $fichier | grep ^Vendor | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/marque_bios.txt
#ReleaseDate_bios
sudo cat $fichier | grep ^ReleaseDate | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/releasedate_bios.txt
#version_bios
sudo cat $fichier | grep ^Version | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/version_bios.txt
#Manufacturer
sudo cat $fichier | grep ^Manufacturer | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/manufacturer.txt
#ProductName
sudo cat $fichier | grep ^ProductName | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/productname.txt
#SerialNumber
sudo cat $fichier | grep ^SerialNumber | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/serialnumber.txt
#cpu_family
sudo cat $fichier | grep ^"cpu family" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/cpu_family.txt
#cpu_MHz
sudo cat $fichier | grep ^"cpu MHz" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/cpu_frequency.txt
#cpu cores
sudo cat $fichier | grep ^"cpu cores" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/cpu_cores.txt
#cpuid level
sudo cat $fichier | grep ^"cpuid level" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/cpuid_level.txt
#model cpu
sudo cat $fichier | grep ^"model" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/model_cpu.txt
#model name 
sudo cat $fichier | grep ^"model name" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/model_cpu_name.txt
#cpu flags 
sudo cat $fichier | grep ^"flags" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/cpu_flags.txt
#cpu type 64b or 32b
sudo cat $fichier | grep ^"width" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/cpu_type.txt
#Ram
sudo cat $fichier | grep ^"Size" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/ram_taille.txt
#Nombre de slot de RAM
sudo cat $fichier | grep ^"NumberOfDevices" | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/ram_number_of_devices.txt
#informations sur les cartes RX
cpte=1
for card_line in `cat $fichier | grep -n description: | cut -d ":" -f 1`
do 
	#sudo echo $label_number
	sudo sed -n "$card_line"p $fichier | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/nc"$cpte"_description.txt 
	sudo sed -n $(expr "$card_line" + 1)p $fichier | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/nc"$cpte"_product.txt
	sudo sed -n $(expr "$card_line" + 2)p $fichier | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/nc"$cpte"_vendor.txt
	sudo sed -n $(expr "$card_line" + 3)p $fichier | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/nc"$cpte"_logicalname.txt
	sudo sed -n $(expr "$card_line" + 4)p $fichier | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/nc"$cpte"_serial.txt
	sudo sed -n $(expr "$card_line" + 5)p $fichier | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/nc"$cpte"_ip.txt

        nom=`cat $chemin_epse/$nom_epse/inventaire/default/$ip_pc/nc"$cpte"_logicalname.txt`
        sudo /var/www/overview/code/scripts/guillaume/create_bases_carte.sh $nom_epse $ip_pc $nom
        
	let "cpte=cpte+1"
done 
#Storage informations
disk_number=1
for disk_line in `cat $fichier | grep -n Disque_ | cut -d ":" -f 1`
do
	sudo sed -n "$disk_line"p $fichier | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/hdd"$disk_number"_nom.txt
	nom_disque=`cat $chemin_epse/$nom_epse/inventaire/default/$ip_pc/hdd"$disk_number"_nom.txt`
	nom_disque_base=`echo $nom_disque |cut -d / -f 3`
	commande="sudo /var/www/overview/code/scripts/guillaume/create_bases_disk.sh $nom_epse $ip_pc $nom_disque_base"
	sudo sed -n $(expr "$disk_line" + 1)p $fichier | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/hdd"$disk_number"_modele.txt
	sudo sed -n $(expr "$disk_line" + 2)p $fichier | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/hdd"$disk_number"_taille.txt
sudo echo "disknumber: $disk_number"
	partition_number=1
	for partition_line in `cat $fichier | grep -n Partition:"$nom_disque" | cut -d ":" -f 1`
	do
		sudo echo "partition_line: $partition_line"
		sudo sed -n "$partition_line"p $fichier | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/hdd"$disk_number"_part"$partition_number"_nom.txt
		sudo sed -n $(expr "$partition_line" + 1)p $fichier | cut -d ":" -f 2  > $chemin_epse/$nom_epse/inventaire/default/$ip_pc/hdd"$disk_number"_part"$partition_number"_taille.txt

		nom_partition_base=`sudo cat $chemin_epse/$nom_epse/inventaire/default/$ip_pc/hdd"$disk_number"_part"$partition_number"_nom.txt | cut -d / -f 3`
        commande=$commande" "$nom_partition_base
        echo $commande

 		let "partition_number=partition_number+1"	
	done
        exec $commande
	let "disk_number=disk_number+1"
done
