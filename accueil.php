<?php
if(!isset($_GET["entreprise"])){
        echo"Bienvenue sur Overview ! <br/> Voici les entreprises disponibles : ";
        $entreprises = [];
        exec("ls projets",$entreprises);
        foreach ($entreprises as $nom) {
                echo "<br/>";
                echo "<a href='./index.php?entreprise=".$nom."'>".$nom."</a>";
        }
}elseif(!isset($_GET["groupe"])){
            $groupes = [];
        exec("ls projets/".$_GET["entreprise"]."/inventaire",$groupes);
        foreach ($groupes as $nom) {
                echo "<br/>";
                echo "<a href='./index.php?entreprise=".$_GET["entreprise"]."&groupe=".$nom."'>".$nom."</a>";
        }
}elseif(!isset($_GET["machine"])){
            $machines = [];
        exec("ls projets/".$_GET["entreprise"]."/inventaire/".$_GET["groupe"],$machines);
        foreach ($machines as $nom) {
                echo "<br/>";
                echo "<a href='./index.php?entreprise=".$_GET["entreprise"]."&groupe=".$_GET["groupe"]."&machine=".$nom."'>".$nom."</a>";
        }
}elseif(!isset($_GET["c"])){
            $categories = ["supervision","inventaire","alertes"];
        #exec("ls projets/".$_GET["entreprise"]."/inventaire/".$_GET["groupe"],$machines);
        foreach ($categories as $nom) {
                echo "<br/>";
                echo "<a href='./index.php?entreprise=".$_GET["entreprise"]."&groupe=".$_GET["groupe"]."&machine=".$_GET["machine"]."&c=".$nom."'>".$nom."</a>";
        }
}elseif(isset($_GET["c"])){
            switch ($_GET["c"]){
                case "supervision":
                    $graphes=[];
                    exec("ls projets/".$_GET["entreprise"]."/supervision/".$_GET["machine"]."/graphes",$graphes);
                    foreach ($graphes as $nom) {
                        echo "<br/>";
                        echo "<img src='".$nom."'>";
                    }
                    break;
                case "inventaire":
                    exec("cat projets/".$_GET["entreprise"]."/inventaire/".$_GET["groupe"]."/".$_GET["machine"]."/ram_taille",$valeur);
                    echo $valeur;
                    

                    break;
                case "alertes":
                    $lignes=[];
                    exec("cat projets/".$_GET["entreprise"]."/supervision/".$_GET["machine"]."alertes",$fichiers);
                    foreach ($lignes as $nom) {
                        echo "<br/>";
                        echo $nom;
                    }
                    break;
            }
}
?>
