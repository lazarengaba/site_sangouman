<?php

    require_once "../requiredPages/connect.php";

    if (isset($_POST['nomP'])&&isset($_POST['prenomP'])&&isset($_POST['emailP'])&&isset($_POST['telP'])&&isset($_POST['messageP'])
        &&$_POST['nomP']!=""&&$_POST['prenomP']!=""&&$_POST['emailP']!=""&&$_POST['telP']&&$_POST['messageP']) {
        
        $nomP = htmlspecialchars($_POST['nomP']);
        $prenomP = htmlspecialchars($_POST['prenomP']);
        $emailP = htmlspecialchars($_POST['emailP']);
        $BPP = htmlspecialchars($_POST['BPP']);
        $telP = htmlspecialchars($_POST['telP']);
        $messageP = htmlspecialchars($_POST['messageP']);

        $insert=$bdd->prepare("INSERT INTO messages_pers (nom, prenom, email,bp, tel, message)
                                VALUES (?,?,?,?,?,?)");
        $insert_exe=$insert->execute(array($nomP, $prenomP, $emailP,$BPP, $telP, $messageP));
        $insert->closeCursor();
        
    }

?>