<?php
    require_once "../requiredPages/connect.php";

    $update=$bdd->prepare("UPDATE sous_menus SET text = ? WHERE menu = ? AND sous_menu = ? ");
    $update_exe=$update->execute(array($_POST['descActuP'], $_POST['menu'], $_POST['sousMenu']));
    $update->closeCursor();

?>

<div class="successMessage">
    <b>Sous-menu ajoutée avec succès !</b>
</div>

<script>
    $('.successMessage').click(function() {
        $(this).hide();
    });
</script>