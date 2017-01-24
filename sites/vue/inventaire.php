<!DOCTYPE html>
<html lang="fr">
    
    <head>
    
        <meta charset="utf-8">
        <title>Mon application</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="Connexion à mon application">
        <link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" />
        <!-- ci-dessous notre fichier CSS -->
        <link rel="stylesheet" type="text/css" href="../css/app.css" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Open+Sans:400,300" />
        <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Lato:400,700,300" />
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    </head>
    <body>
    
    </body>
</html>


<div class="container">
<div class="row">
<div class="col-xs-12">
    
    <div class="main">
            
        <div class="row">
        <div class="col-xs-12 col-sm-6 col-sm-offset-1">
                    
            <?php
echo "<form action='gestion' method='post'>";
echo "<table>";
echo "<tr>";
	echo "<td>Machine</td><td>Groupe</td><td>Tags</td>";
for($i=0;$i<count($machines);$i++){
	$tags = getTagsByMachine($machines[$i]["id"]);
	echo "<tr>";
	echo "<td>".$machines[$i]["nom"]."</td>";
	echo "<td>".$machines[$i]["groupe"]."</td>";
	$html_tags = tags_html($tags);
	echo "<td>".$html_tags."</td>";
	echo "<td><input type='checkbox' name='machine[]' value='".$machines[$i]["id"]."'></td>";
	echo "</tr>";
}
echo "<table>";
echo '<div class="col-md-offset-0 col-md-8"><input name="action" class="btn btn-success btn btn-success" type="submit" value="Gérer"/></div>';
echo "</form>";

?>
            
        </div>
        </div>
        
    </div>
</div>
</div>
</div>
