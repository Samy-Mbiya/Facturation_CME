<?php
	require 'Head.php';
	require 'Navbar.php';
?>
  <div class="span9">
    <!-- Contenue
    ================================================== -->
      <section id="dropdowns">
        <div>
           <!--  
          <div>
           <img src="img/LOGO CME.jpg" style="float: left;" width="100"> 
          </div>
         -->
          <div class="text-center" >
           <h1> CENTRE MEDICAL DE L’ESPOIR </h1>
            <div><em>5 bis, avenue Mont des Arts C/Lingwala</em></div>
            <div> <em>Phone : (+243)812902286-815203932</em> </div>
            <div><em>cliniquedelespoir01@gmail.com et michelmusafiri@gmail.com</em></div>
            <div><em>www.clinique-de-l-espoir.org</em></div>
          </div> 
        </div>
        <div class="text-center"><h3> <u>TRAITEMENT</u></h3></div>
        <div>
          <h4><u>Information du patient</u></h4>

          <!-- Information du patient-->
            <?php 
      				require ("Info_ Patient.php");
      				$id=$_GET['id_pa'];
              $id_consultation=$_GET['Id_consultation'];
      				$aff1=$conn->query("SELECT * FROM  consultation, personnel WHERE consultation.Id_pa='$id' AND consultation.Id_pr=personnel.Id_pr AND consultation.Id_consultation='$id_consultation' ORDER BY consultation.Id_consultation DESC ");
      		  ?>
          <!-- Affichage du Traitement -->
          <div id="NCAff"></div>
          <div  id="IFP" >
			      <p ><a href="Patient.php?id_pa=<?php echo $id ?>" id="head"><i class="icon-fast-backward" ></i>Retour</a></p> 
            <h4><u>Traitement</u></h4> 
            Consultation faite par Docteur <b><?php echo $_GET['Pr']?></b> 
             le <?php
             $Date= substr($_GET['date'],0,8);
          
             echo $Date.' vers '.$_GET['heure'] ?></p>
            <div id="myTabContent" class="tab-content" >
			
        
          <p><div id="message"></div>
					<table>
						<form method="post" >
							<tr>
							  <td>
							  	<input style="width:10px; visibility:collapse" value="<?php echo $id ?>"  name="id_p" id="id_pp"/>
								<input style="width:10px; visibility:collapse" value="<?php echo $id_consultation ?>"  name="id_cons" id="id_cons"/>
							  </td>
							 </tr>
							 <tr>
							  <td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							</tr>
                    	</form>
                  </table>
				   <!--Affichage de la du traitement
                 +++++++++++++++++++++++++++++++++-->
				  <?php 
                    $aff3=$conn->query("
                    SELECT * FROM traitement WHERE Id_pa='$id' AND Id_cons='$id_consultation'");
                  ?>
				 <table class="table table-striped table-bordered">
				 	<thead>
						<th>Medicament</th>
					</thead>
						<tbody>
							<?php while($t1=$aff3->fetch()) {?>
								<tr>
									<td><?php echo $t1['Medicament'];  ?></td>
								</tr>
							 <?php 
							 } ?>
						</tbody>
				 </table>
         </p>
        </div>
      </div>
    </div>
   </div>
  </section>
</div>
</div>
</div>
<?php
  require 'Footer.php';
 