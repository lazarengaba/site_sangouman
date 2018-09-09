<?php
    require_once "../requiredPages/connect.php";

    $req=$bdd->prepare("DELETE FROM messages_pers WHERE id = ?");
    $req_exe=$req->execute(array($_GET['id']));
    $req->closeCursor();

    header('Location: ../administration');
?>