<?php

    require_once "../requiredPages/connect.php";

    $req="SELECT * FROM news_letter WHERE email = ?";
    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute(array($_POST['emailNewsLetter']));
    $req_rows=$req_build->rowCount($req);

    if ($req_rows) {
        echo "<div style='font-size: 13px; margin-top: 5px; margin-left: -30px; color: #f90e29;'><i class='times icon'></i>Déjà utilisé !</div>";
    } else {
        $insert=$bdd->prepare("INSERT INTO news_letter (email) VALUES (?)");
        $insert_exe=$insert->execute(array($_POST['emailNewsLetter']));
        $insert->closeCursor();

        echo "<i style='color: #03a903; font-size: 18px; margin-top: 5px; margin-left: 15px;' class='thumbs up icon'></i>";
    }
    
?>


