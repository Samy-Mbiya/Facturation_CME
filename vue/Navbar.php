	<?php
	// verification de la connexion
	session_start();
	if (!isset($_SESSION['User'])) {
		echo "<script type='text/javascript'>  document.location.replace('index.php');</script>";
		exit();
	}
	?>
	<div class="container">
		<!-- Menu
    ================================================== -->
		<div class="row">
			<div class="span3 bs-docs-sidebar">
				<ul class="nav nav-list bs-docs-sidenav affix-top" id="head">
					<li><a href="#"><i class="icon-chevron-right"></i>Bienvenue Docteur <?php echo htmlentities(trim($_SESSION['User'])); ?></a></li>
					<li><a href="Liste_Patients.php"><i class="icon-chevron-right"></i>Liste Patient</a></li>
					<li><a href="Liste_Fac.php"><i class="icon-chevron-right"></i>Liste Facture</a></li>
					<li><a href="deconnexion.php"><i class="icon-chevron-right"></i> Deconnexion</a></li>
				</ul>
			</div>