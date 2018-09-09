<?php

    require_once "../requiredPages/connect.php";

    $req="SELECT * FROM actu_p";
    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute();
    $req_fetch=$req_build->rowCount($req);

?>
<div class="ui grid">
    <div class="row">
        <div class="column six wide computer eight wide tablet sixteen wide mobile">
            <h3><i class="globe icon"></i>Actualités principales</h3><hr />

            <form action='ajax/actu_p/ajouter.php' enctype='multipart/form-data' method='post'>
                <label for="fileSousMenu" class="ui orange button tiny" style="border-radius: 1px; width: 100%;"><i class="image icon"></i>AJouter une photo</label>
                <input type="file" id="fileSousMenu" name="img_sous_menu" style="display: none; outline: none;"><br /><br />

                <button type="submit" class="ui button green tiny" style="border-radius: 1px;">
                    <i class="plus icon"></i>Ajouter l'actualité
                </button>
            </form>

        </div>
        <div class="column ten wide computer eight wide tablet sixteen wide mobile">

        <?php

            if ($req_fetch) {
                echo "<div style='overflow: auto; height: 900px;'>";

                while ($data=$req_build->fetch()) {
                    echo "<img src='img/".$data['img']."' alt='' width='100%'><br />
                    <form action='ajax/actu_p/ajouter.php' method='post'>
                    <input type='hidden' name='id_actu_p' value='".$data['id']."' />";
        
                    if ($data['actif']==0) {
        ?>
                        <a href="activer_actu_p/?id=<?=$data['id']; ?>" class="ui red button tiny" style="border-radius: 0; width: 150px;">
                            <i class="power icon"></i>Activer
                        </a>
        <?php
                    } else {
        ?>
                        <a href="desactiver_actu_p/?id=<?=$data['id']; ?>" class="ui green button tiny" style="border-radius: 0; width: 150px;">
                            <i class="power icon"></i>Désactiver
                        </a>
        <?php
                    }
                    
        ?>
                    <button type='submit' class="ui blue button tiny" style="border-radius: 0; width: 150px;">
                        <i class="edit icon"></i>Modifier
                    </button>
                    <a href="ajax/actu_p/supprimer.php?id=<?=$data['id']; ?>" class="ui red button tiny" style="border-radius: 0; width: 150px;">
                        <i class="trash icon"></i>Supprimer
                    </a><br /><br />

                    </form>

        <?php
                }

                echo "</div>";

            } else {
                # code...
            }

        ?>

        </div>
    </div>
</div>
