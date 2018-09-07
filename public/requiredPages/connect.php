<?php
    try {
		$bdd=new PDO('mysql:host=localhost;dbname=sangouman_db', 'root', '');
	} catch (Exception $e) {
		die("Echec de connexion à la base de donnees");
	}
?>