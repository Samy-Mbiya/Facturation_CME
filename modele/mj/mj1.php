<?php
require("../Connexion.php");

if ($_POST) {
	$code = $_POST['code'];

	if ($code = 4) {
		//Partie d l'enregistrement du LABO
		//**********************************
		if (isset($_POST['val'])) {
			for ($i = 0, $c = count($_POST['val']); $i < $c; $i++) {
				$req = $conn->prepare('UPDATE labo SET Valeur = :Valeur, Val_normal = :Val_normal  WHERE  Id_la = :Id_la ');
				$req->execute(array(
					'Id_la'   => $_POST['lab'][$i],
					'Valeur'  => $_POST['val'][$i],
					'Val_normal'   => $_POST['valnorm'][$i]
				));
			}
		}
	} // Fin code 4 

	if ($code = 5) {
		//Partie d l'enregistrement du LABO covid
		//**********************************
		if (isset($_POST['Id_covid'])) {
			
				$req = $conn->prepare('UPDATE covid SET resultat = :resultat,  	id_user_labo = :id_user_labo WHERE Id_covid = :IdCovid ');
				$req->execute(array(
					'IdCovid'   => $_POST['Id_covid'],
					'resultat'  => $_POST['resultat'],
					'id_user_labo' => $_POST['id_user_labo']
				));
		}
		//echo $_POST['Id_covid']."-". $_POST['resultat']."-".$_POST['id_user_labo'];
	} // Fin code 5
}
