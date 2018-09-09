<?php
	require_once "requiredPages/connect.php";

	$actu_p_sql = "SELECT * FROM actu_p WHERE actif = ?";
	$actu_p=$bdd->prepare($actu_p_sql);
	$actu_p_exe=$actu_p->execute(array(1));
	$test_actu_p=$actu_p->rowCount($actu_p_sql);

	$actu_s_sql = "SELECT * FROM actu_s WHERE actif = ?";
	$actu_s=$bdd->prepare($actu_s_sql);
	$actu_s_exe=$actu_s->execute(array(1));
	$test_actu_s=$actu_s->rowCount($actu_s_sql);

	$req1="SELECT * FROM contacts WHERE typ = ?";
    $req_build1=$bdd->prepare($req1);
    $req_exe1=$req_build1->execute(array("siege"));
    $req_fetch1=$req_build1->rowCount($req1);

    $req2="SELECT * FROM contacts WHERE typ = ?";
    $req_build2=$bdd->prepare($req2);
    $req_exe2=$req_build2->execute(array("contact"));
    $req_fetch2=$req_build2->rowCount($req2);



?>

@extends('required/HTML')

@section('homeBody')


<script type="text/javascript" src="js/jssor.slider-25.2.0.min.js"></script>

	<script src="js/jssor.slider-25.2.0.min.js" type="text/javascript"></script>
    <script type="text/javascript">
        jssor_1_slider_init = function() {

            var jssor_1_SlideshowTransitions = [
              {$Duration:1200,$Opacity:2}
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $SlideshowOptions: {
                $Class: $JssorSlideshowRunner$,
                $Transitions: jssor_1_SlideshowTransitions,
                $TransitionsOrder: 1
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/
            /*remove responsive code if you don't want the slider scales while window resizing*/
            function ScaleSlider() {
                var refSize = jssor_1_slider.$Elmt.parentNode.clientWidth;
                if (refSize) {
                    refSize = Math.min(refSize, 980);
                    jssor_1_slider.$ScaleWidth(refSize);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }
            ScaleSlider();
            $Jssor$.$AddEvent(window, "load", ScaleSlider);
            $Jssor$.$AddEvent(window, "resize", ScaleSlider);
            $Jssor$.$AddEvent(window, "orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        };
    </script>

<br /><br /><br />
    <div class="ui container">
        <div class="ui grid">
			<div class="row">
                <div class="column ten wide computer sixteen wide tablet sixteen wide mobile" style="overflow: hidden;">
					
				@if(!$test_actu_p)
					<br /><br /><br /><br /><br /><br />
					<center><h1><i class="image icon"></i></h1></center>
				@else

					<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
						<!-- Loading Screen -->
						<div data-u="loading" class="jssorl-004-double-tail-spin" style="position:absolute;top:0px;left:0px;text-align:center;background-color:rgba(0,0,0,0.7);">
							<img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="images/double-tail-spin.svg" />
						</div>
						<div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
							
						<?php
							while ($actu_p_data=$actu_p->fetch()) {
						?>
								<div>
									<img data-u="image" src="img/<?=$actu_p_data['img'] ?>" width="100%" />
								</div>
						<?php
							}
						?>

							<a data-u="any" href="https://www.jssor.com" style="display:none">bootstrap slider</a>
						</div>
						<!-- Bullet Navigator -->
						<div data-u="navigator" class="jssorb051" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
							<div data-u="prototype" class="i" style="width:16px;height:16px;">
								<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
									<circle class="b" cx="8000" cy="8000" r="5800"></circle>
								</svg>
							</div>
						</div>
						<!-- Arrow Navigator -->
						<div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
							<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
								<polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
							</svg>
						</div>
						<div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
							<svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
								<polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
							</svg>
						</div>
					</div>
					<script type="text/javascript">jssor_1_slider_init();</script>
					<!-- #endregion Jssor Slider End -->
				@endif
				
				</div>

				<div class="column six wide computer sixteen wide mobile">
					<div class="newsLetter">
						<b><i class="envelope icon"></i>Inscrivez - vous à notre news letter !</b>
					</div>
					<div class="newsLettercontent">
						
							{{ csrf_field() }}

								<input type="text" class="input" id="emailNewsLetter" placeholder="Sair votre e-mail ici" />

								<button id="btnNewsLetter" class="ui button tiny" style="margin-top: 10px; border-radius: 0px;">
									<i class="send icon"></i>Envoyer
								</button><div id="messageRetour"></div>
								<br /><br /><hr />
								<center>
									<i style="font-size: 20px;" class="info circle icon"></i><br />
								</center>
								<div style="text-align: center;">
									<b>L'adresse e-mail que vous allez entrer reçevra des courriers en provenance
									de l'association en guise de compte rendu des différentes activités effectuées.</b>
								</div>

					</div>
				</div>

			</div>

			<div class="row">
				<div class="column sixteen wide computer">
					<h4><b><i class="globe icon"></i>Actualités</b></h4><hr />
				</div>
			</div>
			<div class="row">

				@if(!$test_actu_s)
					<?php
						for ($i=0; $i <4 ; $i++) { 
					?>
							<div class="column four wide computer">
								<br /><br />
								<center><h1><i class="image icon"></i></h1></center>
							</div>
					<?php
						}
					?>
				@else
	
				<?php
					while($actu_s_data=$actu_s->fetch()) { 
				?>
					
					<div class="column four wide computer">
						<img src="actu_s/<?=$actu_s_data['img'] ?>" alt="Actu-IMG" width="100%">
						<div class="actuContent">
							<h3><?=$actu_s_data['titre']; ?></h3>
							<?=substr($actu_s_data['desc_img_actu_s'], 0, 160)."..."; ?>
						</div>
					</div>

				<?php
					}

					if ($test_actu_s<=2&&$test_actu_s!=0) {
				?>
						
						<div class="column eight wide computer">
							<div style="background-color: #2478b3; padding: 10px; color: #fff;">
								<i class="map marker alternate icon"></i><b>Où pouvez - vous nous trouver ?</b>
							</div>
							<div style="border: 1px solid #2478b3; padding: 20px 25px;">
								<span style="font-size: 15px;"><a href="#"><b><i class="home icon"></i>SIEGES</b></a><span>

								<ul type="disc" style="line-height: 25px; font-size: 13px;">
								<?php
									while ($data1=$req_build1->fetch()) {
										echo "<li><b>".$data1['titre']."</b></li>";
									}
								?>
										
								</ul>

								<span style="font-size: 15px;"><a href="#"><b><i class="phone alternate icon"></i>CONTACTS</b></a><span>

								<ul type="disc" style="line-height: 25px; font-size: 13px;">
								<?php
									while ($data2=$req_build2->fetch()) {
										echo "<li><b>".$data2['titre']." : ".$data2['valeur']."</b></li>";
									}
								?>
								</ul>

							</div>
						</div>
						
				<?php
					}
					
				?>

				<div class="column sixteen wide computer">
					<a href="{{'actualites'}}"><i class="eye icon"></i>Voir toutes les actualités</a>
				</div>

				@endif
			</div>

			<div class="row">
				<div class="div column sixteen wide computer">
					<hr />
				</div>
			</div>

			<div class="row">
				<div class="column eight wide computer">
				
					<h4><b>Contactez - nous</b> |<span style="color: red;"><i class="user icon"></i>Personnel</h4></span><hr />
						
						<table cellpadding="5" width="100%" border="1" style="border-collapse: collapse;" id="tablePers">
							<tr>
								<td width="150">
									<b>Nom</b>
								</td>
								<td>
									<input id="nomP" type="text" class="input">
								</td>
							</tr>
							<tr>
								<td>
									<b>Prénom</b>
								</td>
								<td>
									<input id="prenomP" type="text" class="input">
								</td>
							</tr>
							<tr>
								<td>
									<b>E-mail</b>
								</td>
								<td>
									<input id="emailP" type="text" class="input">
								</td>
							</tr>
							<tr>
								<td>
									<b>BP</b> <span style="font-size: 12px;">(Facultatif)</span>
								</td>
								<td>
									<input id="BPP" type="text" class="input">
								</td>
							</tr>
							<tr>
								<td>
									<b>Téléphone</b>
								</td>
								<td>
									<input id="telP" type="text" class="input">
								</td>
							</tr>
							<tr>
								<td>
									
								</td>
								<td>
									<b><i class="comment icon"></i>Saisir le message dans le champs</b><br />
									<textarea name="" id="messageP" class="textarea" style="width: 100%;" rows="10"></textarea><br /><br />
									<button class="ui blue button" style="border-radius: 0px;" id="envoyerMessageP">
										Envoyer
									</button>
									<div id="messagePSent">
										<i class="check icon"></i>Message envoyé !
									</div>
								</td>
							</tr>
						</table>
					
				</div>
				<div class="column eight wide computer">
					
					<h4><span style="color: red;"><i class="users icon"></i><i class="briefcase icon"></i>Entreprise</h4></span><hr />

						<table cellpadding="5" width="100%" border="1" style="border-collapse: collapse; border: 1px solid #ccc;" id="tablePers">
							<tr>
								<td width="200">
									<b>Nom de l'entreprise</b>
								</td>
								<td>
									<input id="nomE" type="text" class="input">
								</td>
							</tr>
							<tr>
								<td>
									<b>Ville</b>
								</td>
								<td>
									<input id="villeE" type="text" class="input">
								</td>
							</tr>
							<tr>
								<td>
									<b>E-mail</b>
								</td>
								<td>
									<input id="emailE" type="text" class="input">
								</td>
							</tr>
							<tr>
								<td>
									<b>BP</b> <span style="font-size: 12px;">(Facultatif)</span>
								</td>
								<td>
									<input id="BPE" type="text" class="input">
								</td>
							</tr>
							<tr>
								<td>
									<b>Téléphone</b>
								</td>
								<td>
									<input id="telE" type="text" class="input">
								</td>
							</tr>
							<tr>
								<td>
									
								</td>
								<td>
									<b><i class="comment icon"></i>Saisir le message dans le champs</b><br />
									<textarea name="" id="messageE" class="textarea" style="width: 100%;" rows="10"></textarea><br /><br />
									<button class="ui blue button" style="border-radius: 0px;" id="envoyerMessageE" >
										Envoyer
									</button>

									<div id="messageESent">
										<i class="check icon"></i>Message envoyé !
									</div>

								</td>
							</tr>
						</table>
						
				</div>
			</div>

        </div>
	</div>

<br /><br /><br /><br /><br />
@endsection