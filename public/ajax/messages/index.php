<?php

    require_once "../../requiredPages/connect.php";

    $messagesE_sql="SELECT * FROM messages_entreprises WHERE lu_e = ?";
    $messagesE=$bdd->prepare($messagesE_sql);
    $messagesE_exe=$messagesE->execute(array(0));
    $messagesE_rows=$messagesE->rowCount($messagesE_sql);

    $messagesP_sql="SELECT * FROM messages_pers WHERE lu = ?";
    $messagesP=$bdd->prepare($messagesP_sql);
    $messagesP_exe=$messagesP->execute(array(0));
    $messagesP_rows=$messagesP->rowCount($messagesP_sql);
?>

<div class="ui grid">
    <div class="row">
        <div class="column eight wide computer">
            <h5><span style="color: red;"><i class="users icon"></i><i class="briefcase icon"></i>Messages d'entreprises :</span> <?=$messagesE_rows." message (s) non lu (s)"; ?></h5><hr />
            <?php
                while ($dataE=$messagesE->fetch()) {
            ?>
                    <div>
                        <b>Nom : </b><?=$dataE['nom_e']; ?><br />
                        <b>Ville : </b><?=$dataE['ville_e']; ?><br />
                        <b>E-mail : </b><?=$dataE['email_e']; ?><br />
                        <b>Boite postale : </b><?=$dataE['bp_e']; ?><br />
                        <b>Téléhone : </b><?=$dataE['tel_e']; ?><br />
                        <div style="border-bottom: 1px solid #bbb; margin: 5px 0;"></div>
                        <b>Message <i class="chevron down icon"></i></b><br />

                        <div class="messageEnvoyes">
                            <?=$dataE['message_e']; ?><br />
                        </div>
                        <a href="supprimer_messageE/?id=<?=$dataE['id']; ?>">
                            <i class="trash icon"></i>Supprimer
                        </a><br /><br />

                    </div>
            <?php
                    
                }
            ?>
        </div>
        <div class="column eight wide computer">
            <h5><span style="color: red;"><i class="user icon"></i>Messages Personnels :</span> <?=$messagesP_rows." message (s) non lu (s)"; ?></h5><hr />
            <?php
                while ($dataP=$messagesP->fetch()) {
            ?>
                    <div>
                        <b>Nom : </b><?=$dataP['nom']; ?><br />
                        <b>Prénom : </b><?=$dataP['prenom']; ?><br />
                        <b>E-mail : </b><?=$dataP['email']; ?><br />
                        <b>Boite postale : </b><?=$dataP['bp']; ?><br />
                        <b>Téléhone : </b><?=$dataP['tel']; ?><br />
                        <div style="border-bottom: 1px solid #bbb; margin: 5px 0;"></div>
                        <b>Message <i class="chevron down icon"></i></b><br />

                        <div class="messageEnvoyes">
                            <?=$dataP['message']; ?><br />
                        </div>
                        <a href="supprimer_messageP/?id=<?=$dataP['id']; ?>">
                            <i class="trash icon"></i>Supprimer
                        </a><br /><br />

                    </div>
            <?php
                    
                }
            ?>
        </div>
    </div>
</div>