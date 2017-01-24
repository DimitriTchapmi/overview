<?php

function getMachinesByEntreprise($entreprise){
	global $bdd;
	$donnees = 0;
	$i=0;
	$req = $bdd->prepare('SELECT id,nom,groupe FROM machines WHERE entreprise = ?');
	$req->execute(array($entreprise)) or die ( print_r($req->errorInfo()) );
	while($donnees = $req->fetch()){
			$renvoyer[$i] = $donnees;
			$i++;
	}
	return $renvoyer;
}



function getMachineById($id){
	global $bdd;
	$donnees = 0;
	$i=0;
	$req = $bdd->prepare('SELECT id,nom,groupe,entreprise FROM machines WHERE id = ?');
	$req->execute(array($id)) or die ( print_r($req->errorInfo()) );
	$donnees = $req->fetch();
	return $donnees;
}

function getEntrepriseById($id){
	global $bdd;
	$donnees = 0;
	$i=0;
	$req = $bdd->prepare('SELECT id,nom FROM entreprise WHERE id = ?');
	$req->execute(array($id)) or die ( print_r($req->errorInfo()) );
	$donnees = $req->fetch();
	return $donnees;
}



function getTagsByMachine($machine){
	global $bdd;
	$donnees = 0;
	$i=0;
	$req = $bdd->prepare('SELECT nom FROM tags WHERE id in (SELECT tag FROM machines_tags WHERE machine = ?);');
	$req->execute(array($machine)) or die ( print_r($req->errorInfo()) );
	while($donnees = $req->fetch()){
			$renvoyer[$i] = $donnees;
			$i++;
	}
	return $renvoyer;
}

function add_tag($tag, $machine){
	global $bdd;
	$req = $bdd-> prepare("SELECT id FROM tags WHERE nom = ?");
			$req->execute(array($tag)) or die ( print_r($req->errorInfo()) );
	$flag = $req->fetch();
	
	if(!$flag){
		$req = $bdd->prepare('INSERT INTO tags (nom) VALUES(:nom)');
			$req->execute(array(
			'nom' => $tag
			)) or die ( print_r($req->errorInfo()) );

		$req = $bdd->prepare('INSERT INTO machines_tags (machine, tag, ) VALUES(:nom_machine, nom_tag)');
			$req->execute(array(
			'nom_machine' => $machine,
			'nom_tag' => $tag
			)) or die ( print_r($req->errorInfo()) );
	}
	
}

function change_groupe ($machine, $groupe){
	global $bdd;
	$machine = intval($machine);
	$a_groupe = GetGroupeByMachine($machine)["groupe"];
	$nom_machine = getMachineById($machine)["nom"];
	$nom_epse = getEntrepriseById(getMachineById($machine)["entreprise"])["nom"];
	//$commande = "sudo scripts/change_group_pc.sh ".$entreprise." ".$nom_machine." ".$a_groupe." ".$groupe;
	//exec($commande);
	$req = $bdd-> prepare("UPDATE machines SET groupe = ? WHERE id = ?");
	$req->execute(array($groupe,$machine)) or die ( print_r($req->errorInfo()) );
}

function GetGroupeByMachine($machine){
	global $bdd;
	$donnees = 0;
	$i=0;
	$req = $bdd->prepare('SELECT id, groupe FROM machines WHERE id = ?');
	$req->execute(array($machine)) or die ( print_r($req->errorInfo()) );
	$donnees = $req->fetch();
	return $donnees;
}



?>