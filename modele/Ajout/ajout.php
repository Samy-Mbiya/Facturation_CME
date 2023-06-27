<!-- AJOUT  -->
<!-- ------ -->
<?php require ("../Connexion.php") ; ?> <!-- Appel de la connexion -->
<?php  
if($_POST)
	{
		$code=$_POST['code'];
		//Enregistrement Honnoraire 
		if($code==1){
					$date=date("d/m/y");
					$heure=date("H:i");
					
					//Enregistrement 
					$req = $conn->prepare('INSERT INTO consultation (Id_pr, Id_pa, s, ATCD, HMA, CA, EP, A, CAT, Date, Heure ) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
					$req->execute(array($_POST['Pr'], $_POST['id_p'], $_POST['S'], $_POST['ATCD'], $_POST['HM'], $_POST['CA'], $_POST['E'], $_POST['D'], $_POST['ES'],  $date,  $heure));
				}			
  	}

