<?php

    require_once "../requiredPages/connect.php";

    $req="SELECT * FROM prix";
    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute();
    $req_fetch=$req_build->rowCount($req);

?>
<div class="ui grid">
    <div class="row">
        <div class="column six wide computer dixteen">
            <h3><i class="bookmark icon"></i>Prix et distinctions</h3><hr />

            <form action='ajax/prix/ajouter.php' enctype='multipart/form-data' method='post'>
                
                <b>Titre</b><br /><input type="text" name="titre" class="input" placeholder="Saisir ici"><br /><br />
                <label for="fileSousMenu" class="ui orange button tiny" style="border-radius: 1px; width: 100%;"><i class="image icon"></i>AJouter une photo</label>
                <input type="file" name="img_sous_menu" id="fileSousMenu" style="display: none; outline: none;"><br /><br />

                <button type="submit" class="ui button green tiny" style="border-radius: 1px;">
                    <i class="save icon"></i>Enregistrer
                </button>
            </form><br />
        </div>

        <?php
            if ($req_fetch) {
                while ($data=$req_build->fetch()) {
        ?>
                    <div class="column five wide computer sixteen mobile">
                        <img src="prix/<?=$data['img']; ?>" alt="" width="100%">

                        <form action='ajax/prix/ajouter.php' method='post'>
                            <input type="hidden" name="id_actu_s" value="<?=$data['id']; ?>">
                            <div style="margin-bottom: 5px;">
                                <input type="text" class="input" style="font-size: 15px;" name="titre" value="<?=$data['titre']; ?>">
                            </div>
                            <center>

                                <button type="submit" class="ui blue button mini" style="border-radius: 0; width: 100px;">
                                    <i class="edit icon"></i>Modifier
                                </button>
                                <a href="ajax/prix/supprimer.php?id=<?=$data['id']; ?>" class="ui red button mini" style="border-radius: 0; width: 110px;">
                                    <i class="trash icon"></i>Supprimer
                                </a>
                            </center>
                        </form>

                    </div>

        <?php
                }
            }
        ?>

    </div>
</div>



