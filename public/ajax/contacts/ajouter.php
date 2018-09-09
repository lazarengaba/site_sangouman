<?php
    require_once "../../requiredPages/connect.php";

    if (isset($_POST['contact'])&&isset($_POST['valeur'])&&$_POST['contact']!=""&&$_POST['valeur']!="") {
        
        $insert=$bdd->prepare("INSERT INTO contacts (titre, valeur, typ) VALUES (?,?,?)");
        $insert_exe=$insert->execute(array($_POST['contact'], $_POST['valeur'], "contact"));
        $insert->closeCursor();


    }

    if(isset($_POST['siege'])&&$_POST['siege']!="") {
        $insert2=$bdd->prepare("INSERT INTO contacts (titre, typ) VALUES (?,?)");
        $insert_exe2=$insert2->execute(array($_POST['siege'], "siege"));
        $insert2->closeCursor();   
    }

    if (isset($_POST['siegeM'])&&$_POST['siegeM']!="") {
        $update1=$bdd->prepare("UPDATE contacts SET titre = ?, typ = ? WHERE id = ?");
        $update_exe1=$update1->execute(array($_POST['siegeM'], 'siege', $_POST['idM']));
        $update1->closeCursor();
    }

    if (isset($_POST['siegeM'])&&$_POST['siegeM']!="") {
        $update1=$bdd->prepare("UPDATE contacts SET titre = ?, typ = ? WHERE id = ?");
        $update_exe1=$update1->execute(array($_POST['siegeM'], 'siege', $_POST['idM']));
        $update1->closeCursor();
    }

    if (isset($_POST['contactsM'])&&$_POST['contactsM']!=""&&isset($_POST['valM'])&&$_POST['valM']!="") {
        $update1=$bdd->prepare("UPDATE contacts SET titre = ?, valeur = ?, typ = ? WHERE id = ?");
        $update_exe1=$update1->execute(array($_POST['contactsM'], $_POST['valM'], 'contact', $_POST['idM']));
        $update1->closeCursor();
    }

    header('Location: ../../administration');

?>