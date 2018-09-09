<?php

    require_once "../requiredPages/connect.php";

    $req="SELECT * FROM actu_s";
    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute();
    $req_fetch=$req_build->rowCount($req);

?>
<div class="ui grid">
    <div class="row">
        <div class="column six wide computer dixteen">
            <h3><i class="globe icon"></i>Actualités secondaires</h3><hr />

            <form action='ajax/actu_s/ajouter.php' enctype='multipart/form-data' method='post'>
                
                <b>Titre</b><br /><input type="text" name="titre" class="input" placeholder="Saisir ici"><br /><br />
                <label for="fileSousMenu" class="ui orange button tiny" style="border-radius: 1px; width: 100%;"><i class="image icon"></i>AJouter une photo</label>
                <input type="file" name="img_sous_menu" id="fileSousMenu" style="display: none; outline: none;"><br /><br />

                <b>Joindre une description <i class="chevron down icon"></i></b><br /><br />

                <textarea name="desc_img" class="textarea" style="width: 100%;" rows="15"></textarea><br /><br />

                <button type="submit" class="ui button green tiny" style="border-radius: 1px;">
                    <i class="plus icon"></i>Ajouter l'actualité
                </button>
            </form><br />
        </div>

        <?php
            if ($req_fetch) {
                while ($data=$req_build->fetch()) {
        ?>
                    <div class="column five wide computer sixteen mobile">
                        <img src="actu_s/<?=$data['img']; ?>" alt="" width="100%">

                        <form action='ajax/actu_s/ajouter.php' method='post'>
                            <input type="hidden" name="id_actu_s" value="<?=$data['id']; ?>">
                            <div class="articleComment">
                                <input type="text" class="input" style="font-size: 15px;" name="titre" value="<?=$data['titre']; ?>">
                                <textarea name="desc_img" id="" style='width: 100%; border: none; text-align: justify; background-color: transparent; font-size: 14px; line-height: 20px;' rows="6"><?=$data['desc_img_actu_s']; ?></textarea>
                            </div>
                            <center>
        <?php
                            if ($data['actif']==0) {
        ?>
                                <a href="activer_actu_s/?id=<?=$data['id']; ?>" class="ui red button mini" style="border-radius: 0; width: 100px;">
                                    <i class="power icon"></i>Activer
                                </a>
        <?php
                            } else {
        ?>
                                <a href="desactiver_actu_s/?id=<?=$data['id']; ?>" class="ui green button mini" style="border-radius: 0; width: 105px;">
                                    <i class="power icon"></i>Désactiver
                                </a>
        <?php
                            }
                    
        ?>
                                <button type="submit" class="ui blue button mini" style="border-radius: 0; width: 100px;">
                                    <i class="edit icon"></i>Modifier
                                </button>
                                <a href="ajax/actu_s/supprimer.php?id=<?=$data['id']; ?>" class="ui red button mini" style="border-radius: 0; width: 110px;">
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

