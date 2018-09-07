@if(!isset(Auth::user()->email)||(Auth::user()->level) != 5)
    <script>
        window.location="home";
    </script>
@endif
<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Sangouman</title>
		<link rel="stylesheet" type="text/css" href="css/style.css" />
        <link rel="stylesheet" href="css/semantic/dist/semantic.min.css" />
		<link rel="icon" type="image/png" href="images/logo.jpg" >
	</head>
	<body>

        <div class="menu" style="top: 0;">
            <div class="ui container">
                <div class="row">
                    <div class="column sixteen wide computer">
                        <ul class="ulG">
                            
                            <li class="menus">
                                <a href="{{''}}" class="Home">
                                <i class="cogs icon"></i>
                                    <b>Administration</b>
                                </a>
                            </li>
                            <li class="menus" id="menu1">
                                <span class="menuItems">
                                    Sous-menus
                                </span>
                            </li>
                            <li class="menus" id="menu2">
                                <span class="menuItems">
                                    Actus pricipales
                                </span>

                            </li>
                            <li class="menus" id="menu3">
                                <span class="menuItems">
                                    Actus secondaires
                                </span>
                            </li>
                            <li class="menus" id="menu4">
                                <span class="menuItems">
                                    Localités d'intervention
                                </span>
                            </li>
                            <li class="menus" id="menu5">
                                <span class="menuItems">
                                    Ajouter un pôle
                                </span>
                                

                            </li>
                            <li class="menus" id="menu6">
                                <span class="menuItems">
                                    Espace multimedia
                                </span>
                            </li>
                            <li class="menus">
                                <a href="{{'logout'}}" class="menuItems">
                                    <i class="log out icon"></i>
                                </a>
                            </li>
                            <li style='float: left; list-style-type: none' class="sideBar">
                                <a href="#" style="color: #FFF; font-size: 14px;">
                                    <i class="cogs icon"></i>
                                    <b>Adminstration</b>
                                </a>
                            </li>
                            <li style='float: right; list-style-type: none' class="sideBar">
                                <a href="#" style="color: #FFF; font-size: 18px;" id="toggle">
                                    <i class="sidebar icon"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div><br /><br />
        <center>
        <div class="ui buttons tiny">
            <a href="#" class="ui button" style='border-radius: 0;'>
                <i class="bookmark icon"></i>Prix et distinctions
            </a>
            <a href="#" class="ui button">
                <i class="question circle icon"></i>FAQ
            </a>
            <a href="#" class="ui button">
                <i class="calendar icon"></i>Agenda
            </a>
            <a href="#" class="ui button">
                <i class="phone icon"></i>Contacts
            </a>
            <a href="#" class="ui button" style='border-radius: 0;'>
                <i class="hand point right icon"></i> Partenaires
            </a>
        </div>
        </center>
        <br /><br /><br />

        <div class="ui container">
            <div class="ui grid">
                <div class="row">
                    <div class="column sixteen wide computer">
                        <div class="adminBody"><br />
                            <center>
                                
                                <img src="images/logo.jpg" alt="Img-logo" /><br />

                                <h2 style="color: red;">Espace réservé administrateur</h2>

                                <img src="images/Services_96px.png" alt="img-cogs"><br /><br />
                                
                                <a href="#" class="ui blue button" style="border-radius: 1px;">
                                    <i class="wrench icon"></i>Paramètre profil
                                </a>

                                <br /><br />

                                <div style="border-bottom: 1px solid #ccc;"></div><br /><br />

                                <a href="#">
                                    Copyright<i class="copyright icon"></i>2018 SANGOU-MAN
                                </a> |
                                <a href="#">Tous drois réservés.</a>

                            </center>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="js/jquery compressed-3.2.1.min.js"></script>
        <script type="text/javascript" src="css/semantic/dist/semantic.min.js"></script>

        <script>
            $('#menu1').click(function() {
                $.post("ajax/sousMenu.blade.php", function(data) {
                    $('.adminBody').html(data);
                });
                
            });
            $('#menu2').click(function() {
                $.post("ajax/actus_principales.blade.php", function(data) {
                    $('.adminBody').html(data);
                });
                
            });
            $('#menu3').click(function() {
                $.post("ajax/actus_secondaires.blade.php", function(data) {
                    $('.adminBody').html(data);
                });
                
            });
            $('#menu4').click(function() {
                $.post("ajax/localite_d_intervention.blade.php", function(data) {
                    $('.adminBody').html(data);
                });
            });

            $('#menu5').click(function() {
                $.post("ajax/ajouter_pole.blade.php", function(data) {
                    $('.adminBody').html(data);
                });
            });

             $('#menu6').click(function() {
                $.post("ajax/espace_multimedia.blade.php", function(data) {
                    $('.adminBody').html(data);
                });
            });

        </script>

    </body>
</html>