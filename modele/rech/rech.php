<?php

if ($_POST) {
	require("../Connexion.php"); //Appel de la connexionSELECT * FROM patient WHERE Nom LIKE '%$N_P%' OR Post_nom LIKE '%$PN_P%'



	//Verification de l'utilisateur
	if ($_POST['code'] == 1) {
		$N_u = $_POST['User'];
		$Pw_u = $_POST['Pw'];
		$rc = $conn->query("SELECT * FROM personnel WHERE Nom='$N_u' AND Mot_de_passe='$Pw_u'");
		$compt = $conn->query("SELECT COUNT(*) AS Id_pr FROM personnel WHERE Nom='$N_u' AND Mot_de_passe='$Pw_u' ");
		$ts = $compt->fetch();
		$nb = $ts['Id_pr'];

		if ($nb == 1) { // verification de l'existance et si la valeure est vide
			session_start();
			$_SESSION['User'] = $_POST['User'];
			echo "<script type='text/javascript'>  document.location.replace('Liste_Patients.php');</script>";
			exit();
		} else {
			echo "Le Login ou le mot de passe est mal saisie!";
		} //Fin SI
	}

	//Recherche Patient
	$N_P = $_POST['N_P'];
	$PN_P = $_POST['PN_P'];
	$rs = $conn->query("SELECT * FROM patient WHERE Nom LIKE '%$N_P%' OR Post_nom LIKE '%$PN_P%'");

	if ($_POST['code'] == 2) //Champ vide
	{
?>

		<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>#</th>
					<th>Nom</th>
					<th>Post-Nom</th>
					<th>Prenom</th>
				</tr>
			</thead>
			<?php
			while ($p = $rs->fetch()) {
				$id_pa = $p['id_pa'];
				//echo $id_pa;
			?>
				<tbody>
					<tr>
						<td>
							<a href="../vue/Patient.php?id_pa=<?php echo ($p['id_pa']) ?>"><?php echo ($p['id_pa']) ?></a>
						</td>
						<td>
							<a href="../vue/Patient.php?id_pa=<?php echo ($p['id_pa']) ?>"><?php echo ($p['Nom']) ?></a>
						</td>
						<td>
							<a href="../vue/Patient.php?id_pa=<?php echo ($p['id_pa']) ?>"><?php echo ($p['Post_nom']) ?>
							</a>
						</td>
						<td><a href="../vue/Patient.php?id_pa=<?php echo ($p['id_pa']) ?>"><?php echo ($p['Prenom']) ?></a>
						</td>
					</tr>
				<?php } ?>

				</tbody>
		</table>
<?php
	}

//Recherche Patient Covid
if ($_POST['code'] == 3) 
	{
?>

		<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
			<thead>
				<tr>
					<th>#</th>
					<th>Nom</th>
					<th>Post-Nom</th>
					<th>Prenom</th>
				</tr>
			</thead>
			<?php
			while ($p = $rs->fetch()) {
				$id_pa = $p['id_pa'];
				//echo $id_pa;
			?>
				<tbody>
					<tr>
						<td>
							<a href="../vue/Patient_covid.php?id_pa=<?php echo ($p['id_pa']) ?>&Nom=<?php echo ($p['Nom']) ?>&Post_nom=<?php echo ($p['Post_nom']) ?>&Prenom=<?php echo ($p['Prenom']) ?>"><?php echo ($p['id_pa']) ?></a>
						</td>
						<td>
							<a href="../vue/Patient_covid.php?id_pa=<?php echo ($p['id_pa']) ?>&Nom=<?php echo ($p['Nom']) ?>&Post_nom=<?php echo ($p['Post_nom']) ?>&Prenom=<?php echo ($p['Prenom']) ?> "><?php echo ($p['Nom']) ?></a>
						</td>
						<td>
							<a href="../vue/Patient_covid.php?id_pa=<?php echo ($p['id_pa']) ?>&Nom=<?php echo ($p['Nom']) ?>&Post_nom=<?php echo ($p['Post_nom']) ?>&Prenom=<?php echo ($p['Prenom']) ?>"><?php echo ($p['Post_nom']) ?>
							</a>
						</td>
						<td>
						<td>
							<a href="../vue/Patient_covid.php?id_pa=<?php echo ($p['id_pa']) ?>&Nom=<?php echo ($p['Nom']) ?>&Post_nom=<?php echo ($p['Post_nom']) ?>&Prenom=<?php echo ($p['Prenom']) ?>"><?php echo ($p['Prenom']) ?></a>
						</td>
					</tr>
				<?php } ?>

				</tbody>
		</table>
<?php
	}	
}
