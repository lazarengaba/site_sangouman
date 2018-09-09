<?php
    require_once "../requiredPages/connect.php";

    $req=$bdd->prepare("UPDATE actu_p SET actif = ? WHERE id = ?");
    $req_exe=$req->execute(array(1, $_GET['id']));
    $req->closeCursor();

    header('Location: ../administration');
?>