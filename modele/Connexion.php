<?php
try
{
	// On se connecte à MySQL
    //$conn = new PDO('mysql:host=192.168.85.2;dbname=ce2;charset=utf8', 'medecin', 'Simms2007');
    $conn = new PDO('mysql:host=localhost;dbname=ce2;charset=utf8', 'root', '');

}

catch(Exception $e)

{
		// En cas d'erreur, on affiche un message et on arrête tout
        die('Erreur : '.$e->getMessage());

}


