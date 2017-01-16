#!/bin/bash

        top -n 1 | grep Mem > memory
        top -n 1 | grep Cpu > cpu
        df -h > disk
        lsof > process
        vnstat -i ens3 -tr 60 > network
        memtotal=`sed -n /'Mem :'/p memory |awk '{print $4}'`
        memused=`sed -n /'Mem :'/p memory |awk '{print $8}'`
        vartotal=$memtotal/100
        varused=$memused/100
        result=$((100*($varused)/($vartotal)))
        echo "Memoire utilisé:"$result > supervision # en pourcentage
        cpuusr=`sed -n /'Cpu'/p cpu |awk '{print $2}'`
        cpusys=`sed -n /'Cpu'/p cpu |awk '{print $4}'`
        result=`echo $cpuusr + $cpusys|bc -l`
        aff=`echo "$result * 100" |bc -l`
        echo "Cpu utilisé:"$aff >> supervision # en pourcentage
        disksize=`sed -n /'^\/dev'/p disk |awk '{print $2}'`
        diskuse=`sed -n /'^\/dev'/p disk |awk '{print $5}'`
        echo "Taille disque:"$disksize >> supervision
        echo "Taille disque occupé:"$diskuse >> supervision
        debent=`sed -n /'rx'/p network |awk '{print $2}'`
        debsor=`sed -n /'tx'/p network |awk '{print $2}'`
        #result1=`echo "$debent / 100" |bc -l`
        #result2=`echo "$debsor / 100" |bc -l`
        echo "Débit entrant:"$debent >> supervision # en kb/s
        echo "Débit sortant:"$debsor >> supervision # en kb/s