#!/bin/bash
#$1 : entreprise
#$2 : ip
entreprise=$1
ip=$2

        cat /proc/cpuinfo > test
        dmidecode > test2
        lshw -C network > test3
        lshw -C cpu > test4
        lsblk -l > test5
        lshw -C storage > test6
        #sed -i "s/^[ \t]//g" test2
        #sed -i "s/ //g" test2
        touch /etc/overview/$entreprise/$ip
        echo "BI0S information" > /etc/overview/$entreprise/$ip
        sed -n /'Vendor'/p test2 >> /etc/overview/$entreprise/$ip
        sed -n /'Release Date'/p test2 >> /etc/overview/$entreprise/$ip
        sed -n '10p' test2 >> /etc/overview/$entreprise/$ip
        echo -e "\nSystem information" >> /etc/overview/$entreprise/$ip
        val=`sed -n /'Manufacturer'/= test2 |awk '{print $1}'`
        aff=`echo $val|awk '{print $1}'`
        sed -n ''$aff'p' test2 >> /etc/overview/$entreprise/$ip
        sed -n /'Product Name'/p test2 >> /etc/overview/$entreprise/$ip
        val=`sed -n /'Serial Number'/= test2 |awk '{print $1}'`
        aff=`echo $val|awk '{print $1}'`
        sed -n ''$aff'p' test2 >> /etc/overview/$entreprise/$ip
        echo -e "\nProcessor information" >> /etc/overview/$entreprise/$ip
        cpu=`sed -n /'cpu'/= test`
        cpu2=`sed -n /'model'/= test`
        cpu3=`sed -n /'flags'/= test`
        cpu4=`sed -n /'width'/= test4`
        tmp=`sed -n /'model name'/p test`
        cp=`echo $tmp|tr -d -c "\\:"| wc -c`
        #echo $cp
        if [ $cp -le 1 ]; then
        sed -n /'cpu'/p test >> /etc/overview/$entreprise/$ip
        sed -n /'model'/p test >> /etc/overview/$entreprise/$ip
        sed -n /'flags'/p test >> /etc/overview/$entreprise/$ip
        sed -n /'width'/p test4 >> /etc/overview/$entreprise/$ip
        else
        for i in `seq 1 $cp`
        do
                var=`echo $cpu|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$var'p' test >> /etc/overview/$entreprise/$ip
                var2=`echo $cpu2|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$var2'p' test >> /etc/overview/$entreprise/$ip
                var3=`echo $cpu3|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$var3'p' test >> /etc/overview/$entreprise/$ip
                var4=`echo $cpu4|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$var4'p' test >> /etc/overview/$entreprise/$ip
        done
        fi
        echo -e "\nmemory information" >> /etc/overview/$entreprise/$ip
        sed -n /'\tSize: '/p test2 >> /etc/overview/$entreprise/$ip
        sed -n /'Number Of Devices'/p test2 >> /etc/overview/$entreprise/$ip
        echo -e "\nNetwork information" >> /etc/overview/$entreprise/$ip
        net=`sed -n /'description'/= test3`
        net2=`sed -n /'product'/= test3 `
        net3=`sed -n /'vendor'/= test3`
        net4=`sed -n /'logical name'/= test3`
        net5=`sed -n /'serial'/= test3`
        net6=`ifconfig | grep 'inet adr:' |awk '{print $2}'|cut -d: -f2`
        tmp=`sed -n /'logical name'/p test3`
        cp=`echo $tmp|tr -d -c "\\:"| wc -c`
        ip=`sed -n /'logical name'/p test3|awk '{print $3}'`
        #echo $cp
        #echo $net|awk '{print $2}'|cut -d: -f2
        if [ $cp -le 1 ]; then
        sed -n /'description'/p test3 >> /etc/overview/$entreprise/$ip
        sed -n /'product'/p test3 >> /etc/overview/$entreprise/$ip
        sed -n /'vendor'/p test3 >> /etc/overview/$entreprise/$ip
        sed -n /'logical name'/p test3 >> /etc/overview/$entreprise/$ip
        sed -n /'serial'/p test3 >> /etc/overview/$entreprise/$ip
        inet=`echo $ip |awk '{print $1}'|cut -d' ' -f1`
        aff=`ifconfig $inet| grep "inet ad" | cut -f2 -d: | awk '{print $1}'`
        echo "       ip:"$aff >> /etc/overview/$entreprise/$ip
        else
        for i in `seq 1 $cp`
        do
                desc=`echo $net|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$desc'p' test3 >> /etc/overview/$entreprise/$ip
                prod=`echo $net2|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$prod'p' test3 >> /etc/overview/$entreprise/$ip
                fab=`echo $net3|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$fab'p' test3 >> /etc/overview/$entreprise/$ip
                log=`echo $net4|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$log'p' test3 >> /etc/overview/$entreprise/$ip
                num=`echo $net5|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$num'p' test3 >> /etc/overview/$entreprise/$ip
                inet=`echo $ip |awk '{print $i}'|cut -d' ' -f$i`
                aff=`ifconfig $inet| grep "inet ad" | cut -f2 -d: | awk '{print $1}'`
                echo "       ip:"$aff >> /etc/overview/$entreprise/$ip
                echo -e "\n" >> /etc/overview/$entreprise/$ip
        done
        fi
        echo -e "\nStorage information" >> /etc/overview/$entreprise/$ip
        stk=`sed -n /'disk'/p test5 |awk ' {print $1}'`
        stk2=`sed -n /'disk'/p test5 |awk '{print $4}'`
        cp=`echo $stk | wc -w`
        echo $cp
        if [ $cp -le 1 ]; then
                if [ -s /sys/class/block/$stk/device/model ]; then
                        diskmodel=`cat /sys/class/block/$stk/device/model`
                        echo "       Disque:/dev/"$stk >> /etc/overview/$entreprise/$ip
                        echo "       Modèle:"$diskmodel >> /etc/overview/$entreprise/$ip
                        echo "       Taille disque:"$stk2 >> /etc/overview/$entreprise/$ip
                        echo -e "\n" >> /etc/overview/$entreprise/$ip
                        else
                        echo "       Disque:/dev/"$stk >> /etc/overview/$entreprise/$ip
                        echo "       Modèle:inconnu" >> /etc/overview/$entreprise/$ip
                        echo "       Taille disque:"$stk2 >> /etc/overview/$entreprise/$ip
                        echo -e "\n" >> /etc/overview/$entreprise/$ip
                fi
        else
        for i in `seq 1 $cp`
        do
                disk=`echo $stk|awk '{print $i}'|cut -d' ' -f$i`
                echo "       Disque:/dev/"$disk  >> /etc/overview/$entreprise/$ip
                if [ -s /sys/class/block/$stk/device/model ]; then
                        diskmodel=`cat /sys/class/block/$disk/device/model`
                        else echo "       Modèle:inconnu" >> /etc/overview/$entreprise/$ip
                fi
                disk1=`echo $stk1|awk '{print $i}'|cut -d' ' -f$i`
                echo "       Taille disque:"$disk1 >> /etc/overview/$entreprise/$ip
                echo -e "\n" >> /etc/overview/$entreprise/$ip
        done
        fi
        val=`sed -n /'part'/p test5 |awk ' {print $1}'`
        cp=`echo $val | wc -w`
        #echo $val
        val2=`sed -n /'part'/p test5 |awk '{print $4}'`
        if [ $cp -le 1 ]; then
        echo "       Partition:/dev/"$val >> /etc/overview/$entreprise/$ip
        echo "       Taille partition:"$val2 >> /etc/overview/$entreprise/$ip
        else
        for i in `seq 1 $cp`
        do
                part=`echo $val|awk '{print $i}'|cut -d' ' -f$i`
                echo "       Partition:/dev/"$part  >>/etc/overview/$entreprise/$ip
                taille=`echo $val2|awk '{print $i}'|cut -d' ' -f$i`
                echo "       Taille partition:"$taille  >>/etc/overview/$entreprise/$ip
                echo -e "\n" >> /etc/overview/$entreprise/$ip

        done
        fi
        #rm test test2 test3 test4 test5 test6
        #sed -i "s/^ //g" /etc/overview/$entreprise/$ip
        #sed 's/.*/\L&/' /etc/overview/$entreprise/$ip
