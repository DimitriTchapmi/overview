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

function getEntrepriseByMachine($id_machine){
	global $bdd;
	$donnees = 0;
	$i=0;
	$req = $bdd->prepare('SELECT entreprise FROM machines WHERE id = ?'); // M
	$req->execute(array($id_machine)) or die ( print_r($req->errorInfo()) );
	$donnees = $req->fetch();
	return $donnees["entreprise"];
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

function getIdByTag($nom_tag){
	global $bdd;
	$donnees = 0;
	$req = $bdd->prepare('SELECT id,nom FROM tags WHERE nom = ?');
	$req->execute(array($nom_tag)) or die ( print_r($req->errorInfo()) );
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
	$donnees = $req->fetch();
	
	if(!$donnees){
		$req = $bdd->prepare('INSERT INTO tags (nom) VALUES(:nom)');
			$req->execute(array(
			'nom' => $tag
			)) or die ( print_r($req->errorInfo()) );
		$id_tag = $bdd->lastInsertId();
	}else{
		$id_tag = $donnees["id"];
	}

		$req = $bdd->prepare('INSERT INTO machines_tags (machine,tag ) VALUES(:id_machine, :id_tag)');
			$req->execute(array(
			'id_machine' => $machine,
			'id_tag' => $id_tag
			)) or die ( print_r($req->errorInfo()) );
	
}


function remove_tag_machine($id_tag, $machine){
	global $bdd;
	$machine=intval($machine);
	$id_tag=intval($id_tag);
	$req = $bdd->prepare('DELETE FROM machines_tags WHERE tag = ? AND machine = ? ;');
			$req->execute(array($id_tag,$machine)) or die ( print_r($req->errorInfo()));
}

function existeTag ($nom_tag,$machine){
	global $bdd;
	$req = $bdd-> prepare("select count(1) from tags JOIN machines_tags ON tags.id = machines_tags.tag AND machines_tags.machine= ? AND tags.nom = ? ;");
			$req->execute(array($machine, $nom_tag)) or die ( print_r($req->errorInfo()) );
	$donnees = $req->fetch();
	return $donnees["0"];
}


function update_tags($tags,$rm_tags,$machine){ // nom des tags 
	global $bdd;
	var_dump($machine);
	foreach ($rm_tags as $tag) {
		$id_tag = getIdByTag($tag)["id"];
		var_dump($id_tag);
		if($id_tag){
			var_dump ($id_tag);
			remove_tag_machine($id_tag,$machine);
		}

	}

	foreach ($tags as $tag) {
		if (!existeTag($tag, $machine)){
			add_tag($tag,$machine);
		}
	}

}


function change_groupe ($machine, $groupe){
	global $bdd;
	$machine = intval($machine);
	$a_groupe = GetGroupeByMachine($machine)["groupe"];
	$nom_machine = getMachineById($machine)["nom"];
	$nom_epse = getEntrepriseById(getMachineById($machine)["entreprise"])["nom"];
	$commande = "sudo scripts/change_group_pc.sh ".$nom_epse." ".$nom_machine." ".$a_groupe." ".$groupe;
	exec($commande);
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

function getMaterielBymachine($id_machine){
	global $bdd;
	$donnees = 0;
	$i=0;
	$req = $bdd->prepare('SELECT id,nom FROM materiels WHERE machine = ?');
	$req->execute(array($id_machine)) or die ( print_r($req->errorInfo()) );
	while($donnees = $req->fetch()){
			$renvoyer[$i] = $donnees;
			$i++;
	}
	return $renvoyer;
}

function recherche($entreprise,$chaine){
	global $bdd;
	$donnees = 0;
	$i=0;
	$req = $bdd->prepare('SELECT id,nom,groupe FROM machines WHERE entreprise = ? AND (nom LIKE "%:?%" OR groupe LIKE "%:?%" OR id IN (SELECT machine FROM machines_tags JOIN tags ON machines_tags.tag = tags.id AND tags.nom LIKE "%:?%"));');
		$req->execute(array($entreprise,$chaine,$chaine,$chaine)) or die ( print_r($req->errorInfo()) );
	while($donnees = $req->fetch()){
			$renvoyer[$i] = $donnees;
			$i++;
	}
	return $renvoyer;
}

?>
