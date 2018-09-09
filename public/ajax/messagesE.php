<?php

    require_once "../requiredPages/connect.php";

    if (isset($_POST['nomE'])&&isset($_POST['villeE'])&&isset($_POST['emailE'])&&isset($_POST['telE'])&&isset($_POST['messageE'])
        &&$_POST['nomE']!=""&&$_POST['villeE']!=""&&$_POST['emailE']!=""&&$_POST['telE']&&$_POST['messageE']) {
        
            $nomE = htmlspecialchars($_POST['nomE']);
            $villeE = htmlspecialchars($_POST['villeE']);
            $emailE = htmlspecialchars($_POST['emailE']);
            $BPE = htmlspecialchars($_POST['BPE']);
            $telE = htmlspecialchars($_POST['telE']);
            $messageE = htmlspecialchars($_POST['messageE']);

        $insert=$bdd->prepare("INSERT INTO messages_entreprises (nom_e, ville_e, email_e, bp_e, tel_e, message_e)
                                VALUES (?,?,?,?,?,?)");
        $insert_exe=$insert->execute(array($nomE, $villeE, $emailE, $BPE, $telE, $messageE));
        $insert->closeCursor();
        
    }

?>