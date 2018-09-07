<?php
    require_once "../requiredPages/connect.php";
    
    $req=$bdd->prepare("SELECT * FROM sous_menus WHERE menu = ?");
    $req_exe=$req->execute(array($_POST['menu']));

    while ($data=$req->fetch()) {
        echo "<option>".$data['sous_menu']."</option>";
    }


?>