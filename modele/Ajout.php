<?php 
require ("Connexion.php");

	if($_POST)
	{
		$Nom_P=$_POST['N_P'];
		$Pnom_P=$_POST['PN_P'];
		$Prnom_P=$_POST['PRN_P'];
		$S_P=$_POST['S_P'];
		$Dn_P=$_POST['DN_P'];
		$Ec_P=$_POST['EC_P'];
		$Ad_P=$_POST['A_P'];
		$Ph_P=$_POST['PH_P'];
		$Pr_P=$_POST['PR_P'];
		$Em_P=$_POST['E_P'];
		$rs=$conn->query("SELECT * FROM patient WHERE Nom ='$Nom_P' AND Post_nom='$Pnom_P' AND Prenom='$Prnom_P'");
		
		
		if($Nom_P!="" and $Pnom_P!="" )// Champ non vide
		{
			if($rs->fetch()!=null){ //Recherche reussie donc Mise a joure ou pas
				echo 'Le patient est déjà enregistré';
			}
			else{
				
				//Enregistrement
				$req = $conn->prepare('INSERT INTO patient(Nom, Post_nom, Prenom, Sexe, DN, EC, Adresse, Phone, Profession, Employeur) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
				$req->execute(array($_POST['N_P'], $_POST['PN_P'], $_POST['PRN_P'], $_POST['S_P'], $_POST['DN_P'], $_POST['EC_P'], $_POST['A_P'], $_POST['PH_P'], $_POST['PR_P'], $_POST['E_P']));
			}
			
		}
		
 	
  	}