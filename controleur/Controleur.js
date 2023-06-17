$(document).ready(function () {

	Labo();
	recherche_pat();
	affichage();
	ajouterLigne();
});

function affichage() {
	//affichage Liste patient
	$.get("../modele/Modele.php", function (data) { // on recuper les donnees dans la page Modele.php
		$("#Liste_Patient").html(data); // on l'affiche a la page dans la div voulu
	});
// Affichage liste Covid
$.get("../modele/Modele_Fac.php", function (data) { // on recuper les donnees dans la page Modele.php
		$("#Modele_Fac").html(data); // on l'affiche a la page dans la div voulu
	});
}

function Labo() {
	// Enregistrement Examen Labo coté Laborantain
	//*********************************************

	$.get("../vue/Consultation_EP.php", function (data) { // on recuper les donnees dans la page Modele.php
		$("#Er_Labo").click(function (event) {
			event.preventDefault(); /* garde le chargement sans bouger*/
			var val = $('#val').val();
			var valnorm = $('#valnorm').val();
			var url = "../vue/Liste_Patients.php";//Liste des examen a faire
			if (val == "") {
				alert("Entrez les informations de l'examen");
			} else {
				$.ajax({
					url: "../modele/mj/mj1.php",
					method: "post",
					data: $('form').serialize(),
					dataType: "text",
					success: function (strMessage) {
						$("#message").html(strMessage)
						window.location = url;
					}
				}
				)
			}// Fin Si
		});// Fin Boutton Er_Labo

	}); //Fin Enregistrement Examen


	// Enregistrement Covid coté Laborantain
	//*********************************************

	$.get("../vue/Patient_covid_valeur.php", function (data) { // on recuper les donnees dans la page Modele.php
		$("#E_covid").click(function (event) {
			event.preventDefault(); /* garde le chargement sans bouger*/
			var Id_covid = $('#Id_covid').val();
			var resulta = $('#resultat').val();
			var id_pa = $('#id_pa').val();
			var url = "../vue/Patient_covid.php?id_pa="+id_pa;//Liste des examen a faire
			if (Id_covid == "" || resultat== "choix" ) {
				alert("Entrez le bon resulta svp");
			} else {
				$.ajax({
					url: "../modele/mj/mj1.php",
					method: "post",
					data: $('form').serialize(),
					dataType: "text",
					success: function (strMessage) {
						$("#message").html(strMessage)
						window.location = url;
					}
				}
				)
			}// Fin Si
		});// Fin Boutton Er_Labo

	}); //Fin Enregistrement Examen


	//Modification labo
	//******************

	$.get("../vue/mj.php", function (data) { // on recuper les donnees dans la page Modele.php
		$("#mod_l").click(function (event) {
			event.preventDefault(); /* garde le chargement sans bouger*/
			var val = $('#val').val();
			var url = "../vue/Labo2.php";//Liste des examen a faire
			if (val == "") {
				alert("Entrez les informations de l'examen");
			} else {
				$.ajax({
					url: "../modele/mj/mj1.php",
					method: "post",
					data: $('form').serialize(),
					dataType: "text",
					success: function (strMessage) {
						$("#message").html(strMessage)
						window.location = url;
					}
				}
				)
			}// Fin Si
		});// Fin Boutton Er_Labo

	}); //Fin Enregistrement Examen


	//Login
	//******

	$.get("../vue/index.php", function (data) { // on recuper les donnees dans la page Liste_Patients.php
		$("#lg").click(function (event) {
			event.preventDefault();
			var user = $('#User').val();
			var pw = $('#PW').val;
			if (user == "" || pw == "") {
				alert('Entrez votre Identifiant et votre Mot de passe');
			} else {
				$.ajax({
					url: "../modele/rech/rech.php",/*la page ou vont les donnees*/
					method: "post",
					data: $('form').serialize(),/*les donnees sont recuper*/
					dataType: "text",
					success: function (strMessage) {
						$("#message").html(strMessage);
					}
				}
				)// Fin ajax
			}
		});
	});
}// Fin Enregistrement Total

//Recherche du Patient
function recherche_pat() {

	//Recherche du Patient
	$.get("../vue/Liste_Patients.php", function (data) { // on recuper les donnees dans la page Liste_Patients.php
		$("#Recherche").click(function (event) {
			event.preventDefault();
			var N_P = $('#NP').val();
			var PN_P = $('#PNP').val();
			var code = $('#code').val();
			if (N_P == "" || PN_P == "") {
				alert('Entrez les informations du patient (Identifiant) SVP');
			} else {
				$.ajax({
					url: "../modele/rech/rech.php",/*la page ou vont les donnees*/
					method: "post",
					data: $('form').serialize(),/*les donnees sont recuper*/
					dataType: "text",
					success: function (strMessage) {
						$("#message").html(strMessage)/* En cas de reussite on affiche les donnees dans l'identifiant message */
						$("#Liste_Patient").hide(); // on fait disparetre la div
					}
				}
				)// Fin ajax
			}// Fin condition si
		});
	});// Fin recherche Patient	

	// Affichage des information du patient 
	$.get("../modele/rech/rech.php", function (data) { // on recuper les donnees dans la page Liste_Patients.php
		$("#Aff").click(function (event) {
			event.preventDefault();
			var id_p = $('#id_p').val();
			alert('yeeeees');
		});
	});// Fin recherche Patient

}

// Ajout  de la ligne d'un tableau
function ajouterLigne()
{
	$.get("../vue/Honoraire.php", function(data){
		$("#ajouterLigne").click(function (event){
			var Tableau = document.getElementById("Table_Honoraire"); // TABLEAU
			var ligne = Tableau.insertRow(-1); // On ajout une ligne
			// Colonne ou celulle
			var Col_Description = ligne.insertCell(0); 
			var Col_Prix = ligne.insertCell(1);
			var Col_Type = ligne.insertCell(2);
			Col_Description.innerHTML += " <input type='text' name='Autre'  id = 'Autre' value ='"+ document.getElementById("Desc").value +"' />"; // Ajout de information de champs
			Col_Prix.innerHTML += " <input type='text' name='Autre'  id = 'Autre' value ='"+ document.getElementById("Prix_autre").value +"' />"; // Ajout de information de champs 
			Col_Type.innerHTML += " <input type='text' name='Autre'  id = 'Autre' value ='"+ document.getElementById("Type_autre").value +"' />"; // Ajout de information de 
			
			// Vider le champs
			document.getElementById("Desc").value="";
			document.getElementById("Prix_autre").value="";
			document.getElementById("Type_autre").value="";
		})

	})
}