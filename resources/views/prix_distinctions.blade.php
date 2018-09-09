<?php
	require_once "requiredPages/connect.php";

	$req=$bdd->prepare("SELECT * FROM prix");
	$req_exe=$req->execute();


?>
@extends('required/HTML')

@section('prixDistinctions')<br /><br /><br />
	
	<div class="ui container">
		<div class="ui grid">
			<div class="row">
				<div class="ui sixteen wide computer">
					<h3><i class="certificate icon"></i>Prix et distinctions</h3>
				</div>
			</div>
			<div class="row">
			<?php
				while ($data=$req->fetch()) {
			?>
					
					<div class="column four wide computer">
						<img src="prix/<?=$data['img']; ?>" alt="" width="100%"><br />
						<div>
							<center><h4><b><?=$data['titre'] ?></b></h4></center>
						</div>
					</div>
					
			<?php
				}
			?>
			</div>
		</div>
	</div>

@endsection