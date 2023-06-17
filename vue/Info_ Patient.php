
          <!-- Information du patient-->
     <?php //require 'Info_Patient.php'; 
				$id=$_GET['id_pa'];
        $aff=$conn->query("SELECT * FROM  patient WHERE id_pa='$id'");
			?>
          	<table class="table-hover">
              <tbody>
              	</tbody><?php while($pa=$aff->fetch()) {?>
                <tr>
                  <td>Nom:</td>
                  <td><?php echo $pa['Nom']; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Post Nom:</td>
                  <td><?php echo $pa['Post_nom']; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Presnom:</td>
                  <td><?php echo $pa['Prenom']; ?></td>
                  <td></td>
                </tr>
                <tr>
                   <td>Sexe:</td>
                   <td><?php echo $pa['Sexe']; ?></td>
                   <td></td>
                </tr>
				
                <tr>
                  <td>Ne:</td>
                  <td><?php echo $pa['DN']; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Etat Civil:</td>
                  <td><?php echo $pa['EC']; ?></td>
                  <td></td>
                </tr>
                 <tr>
                  <td>Adresse :</td>
                  <td><?php echo $pa['Adresse']; ?></td>
                  <td></td>
                </tr>
                <tr>
                   <td>Phone :</td>
                   <td><?php echo $pa['Phone']; ?></td>
                   <td></td>
                </tr>
                <tr>
                  <td>Profession:</td>
                  <td><?php echo $pa['Profession']; ?></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Emploiyeur:</td>
                  <td><?php echo $pa['Employeur']; ?></td>
                  <td></td>
                </tr>
                <?php }?>
              </tbody>
			</table>
          