<?php
function inscription($login,$pass,$mail){
		global $bdd;
		$val = 1;
		$regex = preg_match("#[^a-zA-Z0-9-]#",$login); // A voir expresiion régulière
		if ($regex == 0){
			if(!GetIdByLogin($login)["id"]){ // on vérifie si le login n'est pas déjà pris
				$passhash = password_hash($pass,PASSWORD_DEFAULT);
				$req = $bdd->prepare('INSERT INTO entreprise (nom,mdp,email) VALUES(:nom, :pass, :email)');
				$req->execute(array(
				'nom' => $login,
    			'pass' => $passhash,
    			'email' => $mail,
    			)) or die ( print_r($req->errorInfo()) );
    		}else{
    			$val = "Ce login est déjà utilisé";
    			echo $val;
    		}
    	}else{
    		$val = "Caractère spéciaux interdits dans le login";
    	}
    	return $val;
}
function connexion($login,$pass){
	global $bdd;
	$infos = GetIdByLogin($login);
	$passhash = password_verify($pass,$infos["mdp"]);
	if($passhash){
		return $infos["id"];
	}else
		return $passhash;
}
function GetIdByLogin($login){
	global $bdd;
	$donnees = 0;
	$req = $bdd->prepare('SELECT id, mdp FROM entreprise WHERE nom = ?');
	$req->execute(array($login));
	$donnees = $req->fetch();
	return $donnees;
}
function GetLoginById($id){
	global $bdd;
	$donnees = 0;
	$req = $bdd->prepare('SELECT user_login, user_password, user_role FROM t_user WHERE user_id = ?');
	$req->execute(array($id));
	$donnees = $req->fetch();
	return $donnees;
}