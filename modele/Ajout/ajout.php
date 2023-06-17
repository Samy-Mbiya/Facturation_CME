<!-- AJOUT FICHE DE SURVEILLANCE -->
<!-- --------------------------- -->
<?php require ("../Connexion.php") ; ?> <!-- Appel de la connexion -->
<?php  
if($_POST)
	{
		$code=$_POST['code'];
		
		//Enregistrement Fiche de surveillance
		if($code==2){
			$id_p=$_POST['id_p'];
			$Date=$_POST['Dt'];
			$Heure=$_POST['H'];
			$T=$_POST['T'];
			$TAS=$_POST['TAS'];
			$TAD=$_POST['TAD'];
			$FC=$_POST['FC'];
			$FR=$_POST['FR'];
			$Pd=$_POST['Pd'];
			$Ob=$_POST['Ob'];
			
			try {
				//Enregistrement de la table sv
				$req = $conn->prepare('INSERT INTO sv(TC, TAS, TAD, FC, FR, O, Poid) VALUES(?, ?, ?, ?, ?, ?, ?)');
				$req->execute(array($_POST['T'], $_POST['TAS'], $_POST['TAD'], $_POST['FC'], $_POST['FR'],$_POST['Ob'], $_POST['Pd']));
			}catch(PDOException $e){
				echo 'Erreur PDO :'.$e->getMessage();
				}
				//Nombre d'enregistrement de la table sv
				$req1=$conn->query('SELECT COUNT(*) AS Id_sv FROM sv');
				$resul=$req1->fetch();
				$nb=$resul['Id_sv'];
				$nbb=$nb+1;
				//Enregistrement de la table surveiller
				$re= $conn->prepare('INSERT INTO surveiller(Id_pr, Id_sv, Date, Heure) VALUES(?, ?, ?, ?)');
				$re->execute(array($_POST['id_p'], $nbb, $_POST['Dt'], $_POST['H']));
				echo $_POST['id_p'].'/'.$_POST['Dt'].'/'.$_POST['H'];
			}
			
			//Enregistrement Consultation
			if($code==3){
					$id_p=$_POST['id_p'];
					$Pr=$_POST['Pr'];
					$S=$_POST['S'];
					$ATCD=$_POST['ATCD'];
					$HM=$_POST['HM'];
					$CA=$_POST['CA'];
					$ES=$_POST['ES'];
					$E=$_POST['E'];
					$D=$_POST['D'];
					$date=date("d/m/y");
					$heure=date("H:i");
					echo "$P"."$S"."$ATCD"."$HM"."$CM"."$ES"."$E"."$D";
					
					//Enregistrement 
					$req = $conn->prepare('INSERT INTO consultation (Id_pr, Id_pa, s, ATCD, HMA, CA, EP, A, CAT, Date, Heure ) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)');
					$req->execute(array($_POST['Pr'], $_POST['id_p'], $_POST['S'], $_POST['ATCD'], $_POST['HM'], $_POST['CA'], $_POST['E'], $_POST['D'], $_POST['ES'],  $date,  $heure));
				}
				
			//Enregistrement Examen	
			if($code==4){
				if (isset($_POST['option'])){
					for ($i = 0, $c = count($_POST['option']); $i < $c; $i++)
					{
						$exam=$_POST['option'][$i];
						$Nom_ex=substr("$exam",0,3);
						$type_ex=substr("$exam",3);
						$req = $conn->prepare('INSERT INTO labo (Id_pa ,Id_cons, Nom_ex, Type_ex, Valeur) VALUES(?, ?, ?, ?, ?)');
						$req->execute(array($_POST['id_p'], $_POST['Id_cons'], $Nom_ex,  $type_ex,""));
					}
       			 }
				
				if (isset($_POST['autre'])){
					
					for ($i = 0, $c = count($_POST['autre']); $i < $c; $i++)
					{
						if ($_POST['autre'][$i]!="")
						{
							$exam=$_POST['autre'][$i];
							$Nom_ex=substr("$exam",0,3);
							$type_ex=substr("$exam",3);
							$req = $conn->prepare('INSERT INTO labo (Id_pa ,Id_cons, Nom_ex, Type_ex, Valeur) VALUES(?, ?, ?, ?, ?)');
							$req->execute(array($_POST['id_p'], $_POST['Id_cons'], $Nom_ex,  $type_ex,""));
						}
					}
       			 }
			}
			
			if($code==5)
			{
			
				//Enregistrement Traitement 
					$req = $conn->prepare('INSERT INTO traitement (Medicament, Nb_prise, Qt_prise, Nb_jours, Voi_adm, Temps_adm, Type, Id_pa, Id_cons ) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)');
					$req->execute(array($_POST['Med'], "", "", "", "","", "", $_POST['id_p'], $_POST['id_cons']));
					
					echo $_POST['Med'];
			}
			
  	}

