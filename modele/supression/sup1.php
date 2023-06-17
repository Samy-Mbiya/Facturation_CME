<?php 
	 require ("../Connexion.php") ;//Appel de la connexion
	if($_POST){
		$code=$_POST['code'];
		//SUPPRESSION PATIENT
		if($code==1){
			if($_POST['ID_P']=="")//Champ vide
			{
				echo"EZA VIDE";
				
				}
			else
			{	//suppression du patient
				$id=$_POST['ID_P'];
				
				$req = $conn->prepare('DELETE FROM patient WHERE patient.id_pa = :id_e');
				$req->execute(array(
					'id_e'=>$id
				));
				echo ("Suppression reussie.....");
				}
		}
		// SUPPRESSION FICHE DE SURVEILLANCE
		if ($code==2)
		{
			//suppression du patient
			$Id_sur=$_POST['Id_sur'];
			$Id_sv=$_POST['Id_sv'];
			echo "$Id_sv";
			echo "$Id_sur";
			$req = $conn->prepare('DELETE FROM surveiller WHERE surveiller.Id_surveiller = :Id_sur');
			$req->execute(array(
				'Id_sur'=>$Id_sur
			));
			$req2 = $conn->prepare('DELETE FROM sv WHERE sv.Id_sv = :Id_sv');
			$req->execute(array(
				'Id_sv'=>$Id_sv
			));
			echo ("Suppression reussie.....");

			}
		
		}
		
		
		
	
?>