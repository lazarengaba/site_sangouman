<?php
    require_once "../../requiredPages/connect.php";

        $check_req ="SELECT MAX(id) id FROM prix";
		$check= $bdd->prepare($check_req);
        $check_exe=$check->execute();
        
        $check_val = $check->fetch();

		$NB_check = $check->rowCount($check_req);
    

    if (isset($_FILES['img_sous_menu'])&&$_FILES['img_sous_menu']!="") {
        
        $taille_Max = 1048576;
		$extensions_Valides = array('jpeg', 'jpg', 'png', 'gif');

		if ($_FILES['img_sous_menu']['size'] <= $taille_Max) {
			$extensions_Upload = strtolower(substr(strrchr($_FILES['img_sous_menu']['name'], '.'), 1));

			if (in_array($extensions_Upload, $extensions_Valides)) {

				$chemin = "../../prix/".($check_val['id'] + 1).".".$extensions_Upload;
				$export = move_uploaded_file($_FILES['img_sous_menu']['tmp_name'], $chemin);

				if ($export) {
					$fichier = ($check_val['id'] + 1).".".$extensions_Upload;

					$photo = $bdd->prepare("INSERT INTO prix (titre, img)
                                            VALUES (?,?)");
					$photo_exe=$photo->execute(array($_POST['titre'], $fichier));
				}
			} else {
				
			}

		} else {
			
		}


    }

    $req=$bdd->prepare("UPDATE prix SET titre = ? WHERE id = ?");
    $req_exe=$req->execute(array($_POST['titre'], $_POST['id_actu_s']));
    $req->closeCursor();    

    header('Location: ../../administration');
?>