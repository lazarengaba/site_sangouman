<?php
    require_once "../requiredPages/connect.php";

    $req=$bdd->prepare("UPDATE actu_s SET actif = ? WHERE id = ?");
    $req_exe=$req->execute(array(0, $_GET['id']));
    $req->closeCursor();

    header('Location: ../administration');
?>