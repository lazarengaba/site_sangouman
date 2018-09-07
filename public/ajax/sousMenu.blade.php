<?php
    require_once "../requiredPages/connect.php";

    $req="SELECT * FROM sous_menus";
    $req_build=$bdd->prepare($req);
    $req_exe=$req_build->execute();
    $req_fetch=$req_build->rowCount($req);
?>
<div class="ui grid">
    <div class="row">
        <div class="column six wide computer eight wide tablet sixteen wide mobile">
            <h3><i class="list icon"></i>Sous-menus</h3>
            <div id="messages"></div>
            <hr />
            <table style="font-size: 13px;" cellpadding="4">
                <tr>
                    <td>
                        Menus
                    </td>
                    <td>
                        <select name="menu" id="menu" class="select">
                            <option value="SANGOU-MAN">SANGOU-MAN</option>
                            <option value="PÔLES D'ACTION">PÔLES D'ACTION</option>
                            <option value="DOCUMENTATION">DOCUMENTATION</option>
                            <option value="PROJETS">PROJETS</option>
                            <option value="ACTUALITES ET AGENDA">ACTUALITES ET AGENDA</option>
                            <option value="ESPACE MULTIMEDIA">ESPACE MULTIMEDIA</option>
                        </select>
                    </td>
                    <td>
                        
                    </td>
                </tr>
                <tr>
                    <td>
                        Sous-menus
                        
                    </td>
                    <td>
                        <select name="sousMenu" id="sousMenu" class="select">
                            
                        </select>
                    </td>
                    <td></td>
                </tr>
            </table><br />

            <b>Joindre une description <i class="chevron down icon"></i></b><br /><br />

            <textarea name="descActuP" id="descActuP" class="textarea" rows="15"></textarea><br /><br />

            <a href="#" class="ui button green tiny" style="border-radius: 1px;" id="ajouterSousMenu">
                <i class="refresh icon"></i>Mettre à jour le sous-menu
            </a>
        </div>

        <div class="column ten wide computer sixteen wide mobile">
            <?php
            
            if ($req_fetch) {
               echo "<br /><div style='height: 1000px; overflow: auto; '>";
                while ($data=$req_build->fetch()) {
                    echo "<div style='border-bottom: 1px solid #ccc;'>
                            <h3><b>".$data['sous_menu']."</b></h3>
                        </div>
                        <div style='text-align: justify; margin-bottom: 10px; padding: 5px; width: 100%;'>".substr($data['text'],0,500).".. </div>

                        <a href='#' class='ui blue button mini' style='border-radius: 0; width: 100px;'><i class='edit icon'></i>Modifier</a>
                        <a href='#' class='ui red button mini' style='border-radius: 0; width: 100px;'><i class='trash icon'></i><i class='times icon'></i>Photo</a>
                        <a href='#' class='ui orange button mini' style='border-radius: 0; width: 100px;'><i class='image icon'></i><i class='plus icon'></i>Photo</a>
                        <a href='#' class='ui button mini' style='border-radius: 0; width: 100px;'><i class='eye icon'></i>Apperçu</a>
                        <a href='#' class='ui red button mini' style='border-radius: 0; width: 100px;'><i class='power icon'></i>Activer</a>
                        <br ><br />

                        ";
                }
                echo "</div>";
            } else {
                echo "<center><b>Aucun enregistrement !</b></center>";
            }

            ?>
        </div>

    </div>
</div>

<script>

    var menu = $('#menu').val();

    $.post("/site_sangouman/public/ajax/rechercheSousMenus.blade.php", {menu:menu}, function(data) {
        $('#sousMenu').html(data);
    });

    $('#menu').change(function() {
        var menu = $(this).val();

        $.post("/site_sangouman/public/ajax/rechercheSousMenus.blade.php", {menu:menu}, function(data) {
            $('#sousMenu').html(data);
        });
    });

    $('#ajouterSousMenu').click(function() {
        if ($('#descActuP').val()!="") {

            var menu = $('#menu').val();
            var descActuP = $('#descActuP').val();
            var sousMenu = $('#sousMenu').val();

            $.post("/site_sangouman/public/ajax/misaAjourSousMenus.blade.php", {menu:menu, descActuP:descActuP, sousMenu:sousMenu}, function(data) {
                $('#messages').html(data);
                $('#descActuP').val("");
            });
        } else {
            alert('Impossible de retouner un champs vide !');
        }
    });

</script>