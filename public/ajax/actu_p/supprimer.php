<?php

    require_once "../../requiredPages/connect.php";

    $del = $bdd->prepare("DELETE FROM actu_p WHERE id = ?");
    $del_exe=$del->execute(array($_GET['id']));
    $del->closeCursor();



header('Location: ../../administration');
?>