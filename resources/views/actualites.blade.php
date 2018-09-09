<?php
	require_once "requiredPages/connect.php";

	$req=$bdd->prepare("SELECT * FROM actu_s WHERE actif = ?");
	$req_exe=$req->execute(array(1));

?>
@extends('required/HTML')

@section('actualites')<br /><br /><br />
	
	<div class="ui container">
		<div class="ui grid">
			<div class="row">
				<div class="ui sixteen wide computer">
					<h3><b><i class="globe icon"></i>Actualités</b></h3>
				</div>
			</div>
			<div class="row">
			<?php
				while ($data=$req->fetch()) {
			?>
				<div class="column six wide computer">
					<img src="actu_s/<?=$data['img']; ?>" alt="ACTU_IMG" width="100%" ><br /><br />
				</div>
				<div class="column ten wide computer">
					<h4><a><b><?=$data['titre']; ?></b></a></h4>
					<div style="height: 230px; text-align: justify; overflow: auto; padding-right: 25px;">
						<?=$data['desc_img_actu_s']; ?>
					</div><br /><br />
				</div>
			<?php
				}
			?>
				
			</div>
		</div>
	</div>

@endsection