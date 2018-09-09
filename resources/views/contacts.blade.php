<?php

	require_once "requiredPages/connect.php";	

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

@section('contacts')<br /><br /><br />
	
	<div class="ui container">
		<div class="ui grid">
			<div class="row">
				<div class="column eight wide computer">
					<div style="background-color: #2478b3; padding: 10px; color: #fff;">
						<i class="map marker alternate icon"></i><b>NOS DIFFERENTS SIEGES</b>
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
					</div>
				</div>		

				<div class="column eight wide computer">
					<div style="background-color: #2478b3; padding: 10px; color: #fff;">
						<i class="phone icon"></i><b>NOS CONTACTS</b>
					</div>
					<div style="border: 1px solid #2478b3; padding: 20px 25px;">

						<span style="font-size: 15px;"><a href="#"><b><i class="phone alternate icon"></i>CONTACTS TELEPHONIQUES</b></a><span>

						<ul type="disc" style="line-height: 25px; font-size: 13px;">
						<?php
							while ($data2=$req_build2->fetch()) {
								echo "<li><b>".$data2['titre']." : ".$data2['valeur']."</b></li>";
							}
						?>
						</ul>

					</div>
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

@endsection