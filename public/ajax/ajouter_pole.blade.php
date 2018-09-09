<?php

    require_once "../requiredPages/connect.php";

    $req1="SELECT * FROM contacts WHERE typ = ?";
    $req_build1=$bdd->prepare($req1);
    $req_exe1=$req_build1->execute(array("siege"));
    $req_fetch1=$req_build1->rowCount($req1);

    $req2="SELECT * FROM contacts WHERE typ = ?";
    $req_build2=$bdd->prepare($req2);
    $req_exe2=$req_build2->execute(array("contact"));
    $req_fetch2=$req_build2->rowCount($req2);

?>
<div class="ui grid">
    <div class="row">
        <div class="column sixteen wide computer dixteen">
            <h3><i class="phone alternate icon"></i>Contacts téléphoniques et plus</h3>

            <form action='ajax/contacts/ajouter.php' method='post'>

                <b>Enregistrer un siège</b><br /><input type="text" name="siege" class="input" placeholder="Saisir ici"><br /><br />
                <b>Titre</b><br /><input type="text" name="contact" class="input" placeholder="Saisir ici"><br /><br />
                <b>Valeur</b><br /><input type="text" name="valeur" class="input" placeholder="Saisir ici"><br /><br />

                <button type="submit" class="ui button green tiny" style="border-radius: 1px;">
                    <i class="save icon"></i>Enregistrer
                </button>
            </form><br />
        </div>
    </div>
    <div class="row">

        <?php
            if ($req_fetch1) {
                echo "<div style='color: red;' class='column sixteen wide computer sixteen mobile'><hr />";
                echo "<b><i class='map marker alternate icon'></i>SIEGES</b>";
                echo "</div><br /><br />";
                while ($data1=$req_build1->fetch()) {
        ?>
                    <div class="column eight wide computer sixteen mobile">

                        <form action='ajax/contacts/ajouter.php' method='post'>
                            <input type="hidden" name="idM" value="<?=$data1['id']; ?>">
                            <input type="text" class="input" name="siegeM" value="<?=$data1['titre']; ?>"><br /><br />
                            
                            <center>
                                <button type="submit" class="ui blue button mini" style="border-radius: 0; width: 100px;">
                                    <i class="edit icon"></i>Modifier
                                </button>
                                <a href="ajax/contacts/supprimer.php?id=<?=$data1['id']; ?>" class="ui red button mini" style="border-radius: 0; width: 110px;">
                                    <i class="trash icon"></i>Supprimer
                                </a>
                            </center>
                        </form><br /><br />

                    </div>

        <?php
                }
            }
        
            if ($req_fetch2) {
                echo "<div style='color: red;' class='column sixteen wide computer sixteen mobile'><hr />";
                echo "<b><i class='phone icon'></i>CONTACTS TELEPHONIQUES</b>";
                echo "</div><br /><br />";
                while ($data2=$req_build2->fetch()) {
        ?>
                    <div class="column eight wide computer sixteen mobile">

                        <form action='ajax/contacts/ajouter.php' method='post'>
                            <input type="hidden" name="idM" value="<?=$data2['id']; ?>">
                            <input type="text" class="input" name="contactsM" value="<?=$data2['titre']; ?>">
                            <input type="text" class="input" name="valM" value="<?=$data2['valeur']; ?>"><br /><br />
                            
                            <center>
                                <button type="submit" class="ui blue button mini" style="border-radius: 0; width: 100px;">
                                    <i class="edit icon"></i>Modifier
                                </button>
                                <a href="ajax/contacts/supprimer.php?id=<?=$data2['id']; ?>" class="ui red button mini" style="border-radius: 0; width: 110px;">
                                    <i class="trash icon"></i>Supprimer
                                </a>
                            </center>
                        </form><br />

                    </div>

        <?php
                }
            }
        ?>

    </div>
</div>

