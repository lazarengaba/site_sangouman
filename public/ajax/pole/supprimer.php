<?php

    require_once "../../requiredPages/connect.php";

    $del = $bdd->prepare("DELETE FROM poles WHERE id = ?");
    $del_exe=$del->execute(array($_GET['id']));
    $del->closeCursor();



header('Location: ../../administration');
?>