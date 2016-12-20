#!/bin/bash

        cat /proc/cpuinfo > test
        dmidecode > test2
        lshw -C network > test3
        lshw -C cpu > test4
        df -h > test5
        lshw -C storage > test6
        sed -i "s/^[ \t]//g" test2
        sed -i "s/ //g" test2
        touch inventaire
        echo "BI0S information" > inventaire
        sed -n /'Vendor'/p test2 >> inventaire
        sed -n /'ReleaseDate'/p test2 >> inventaire
        sed -n '10p' test2 >> inventaire
        echo -e "\nsystem information" >> inventaire
        sed -n '22p' test2 >> inventaire
        sed -n /'ProductName'/p test2 >> inventaire
        sed -n '25p' test2 >> inventaire
        echo -e "\ninventaire information" >> inventaire
        sed -n /'cpu'/p test >> inventaire
        sed -n /'model'/p test >> inventaire
        sed -n /'flags'/p test >> inventaire
        sed -n /'width'/p test4 >> inventaire
        echo -e "\nmemory information" >> inventaire
        sed -n '88p' test2 >> inventaire
        sed -n '80p' test2 >> inventaire
        echo -e "\nnetwork information" >> inventaire
        net=`sed -n /'description'/= test3`
        net2=`sed -n /'product'/= test3 `
        net3=`sed -n /'vendor'/= test3`
        net4=`sed -n /'logical name'/= test3`
        net5=`sed -n /'serail'/= test3`
        tmp=`sed -n /'description'/p test3`
        cp=`echo $tmp|tr -d -c "\\:"| wc -c`
        #echo $cp
        #echo $net|awk '{print $2}'|cut -d: -f2
        if [ $cp -le 1 ]; then
        sed -n /'description'/p test3 >> inventaire
        sed -n /'product'/p test3 >> inventaire
        sed -n /'vendor'/p test3 >> inventaire
        sed -n /'logical name'/p test3 >> inventaire
        sed -n /'serial'/p test3 >> inventaire
        else
        for i in `seq 1 $cp`
        do
                desc=`echo $net|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$desc'p' test3 >> inventaire
                prod=`echo $net2|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$prod'p' test3 >> inventaire
                fab=`echo $net3|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$fab'p' test3 >> inventaire
                log=`echo $net4|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$log'p' test3 >> inventaire
                num=`echo $net5|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$num'p' test3 >> inventaire
                echo -e "\n" >> inventaire

        done
        fi

        val=`sed -n /'configuration'/p test3 |awk ' { print $5 }'`
        echo "       "$val >> inventaire
        echo -e "\nstorage information" >> inventaire
        stk=`sed -n /'description'/= test6`
        stk2=`sed -n /'product'/= test6`
        stk3=`sed -n /'vendor'/= test6`
        tmp=`sed -n /'description'/p test6`
        cp=`echo $tmp|tr -d -c "\\:"| wc -c`
        #echo $cp
        if [ $cp -le 1 ]; then
        sed -n /'description'/p test6 >> inventaire
        sed -n /'product'/p test6 >> inventaire
        sed -n /'vendor'/p test6 >> inventaire
        else
        for i in `seq 1 $cp`
        do
                desc=`echo $stk|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$desc'p' test6 >> inventaire
                prod=`echo $stk2|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$prod'p' test6 >> inventaire
                fab=`echo $stk3|awk '{print $i}'|cut -d' ' -f$i`
                sed -n ''$fab'p' test6 >> inventaire
                echo -e "\n" >> inventaire
        done
        fi
        val=`sed -n /'[vs]da[0-9]'/p test5 |awk ' {print $1}'`
        cp=`echo $val | wc -w`
        val2=`sed -n /'[vs]da[0-9]'/p test5 |awk '{print $2}'`
        if [ $cp -le 1 ]; then
        echo "       partition:"$val >> inventaire
        echo "       taille partition:"$val2 >> inventaire
        else
        for i in `seq 1 $cp`
        do
                part=`echo $val|awk '{print $i}'|cut -d' ' -f$i`
                echo "       partition:"$affiche >>inventaire
                taille=`echo $val2|awk '{print $i}'|cut -d' ' -f$i`
                echo "       taille partition:"$taille >>inventaire
                echo -e "\n" >> inventaire

        done
        fi
        #rm test test2 test3 test4 test5 test6
        #sed -i "s/^ //g" inventaire
        #sed 's/.*/\L&/' inventaire
