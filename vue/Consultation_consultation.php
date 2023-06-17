<?php
	require 'Head.php';
	require 'Navbar.php';
?>
<div class="span9">
        <!-- Contenue
        ================================================== -->
        <section id="dropdowns">
          <!--<div  >
            <img src="img/LOGO1.png" style="float: left;" width="100">
          </div> -->
          <div style="text-align: center;" >
            <h1> CENTRE MEDICAL DE L’ESPOIR </h1>
            <div><em>5 bis, avenue Mont des Arts C/Lingwala</em></div>
            <div> <em>Phone : (+243)812902286-815203932</em> </div>
            <div><em>cliniquedelespoir01@gmail.com et michelmusafiri@gmail.com</em></div>
            <div><em>www.clinique-de-l-espoir.org</em></div>
          </div>
          <div class="text-center"><h3> <u>CONSULTATION</u></h3></div> 
          <div>
            <!-- Information du patient-->
            <h4><u>Information du patient</u></h4>
            <?php 
      				require ("Info_ Patient.php");
      				$id=$_GET['id_pa'];
                    	$id_consultation=$_GET['Id_consultation'];
      				$aff1=$conn->query("SELECT * FROM  consultation, personnel WHERE consultation.Id_pa='$id' AND consultation.Id_pr=personnel.Id_pr AND consultation.Id_consultation='$id_consultation' ORDER BY consultation.Id_consultation DESC ");
      			?>
          
            <div id="NCAff"></div>
            <!-- Affichage de la consultation -->
          <div id="IFP" >
			      <p ><a href="Patient.php?id_pa=<?php echo $id ?>" id="head"><i class="icon-fast-backward" ></i>Retour</a></p> 
            <h4><u>Connsultation</u></h4> 
			       Consultation faite par Docteur <b><?php echo $_GET['Pr']?></b> 
             le <?php
             $Date= substr($_GET['date'],0,8);
                       
             echo $Date.' vers '.$_GET['heure'] ?></p>
            <div id="myTabContent" class="tab-content" >
             
			  <div class="tab-pane fade in active" id="sv">
          <p>
             <!-- Anciens Consultation
            +++++++++++++++++++-->
            
            <table class="table-hover">
                <tbody>
                </tr>
                <?php while($p=$aff1->fetch()) {?>
                <tr>
                  <td>
                    <h4><u>Symtome dominant</u></h4>
                    <label id="SD"><?php echo $p['s'] ?></label>
                  </td>
                </tr>
                <tr>
                   <td> 
                     <h4><u>ATCD</u></h4>
                     <label id="ATCD"><?php echo $p['ATCD'] ?></label>
                   </td>
                </tr>
		           <tr>
                   <td> 
                     <h4><u>Histoire de la maladie</u></h4>
                     <label id="CA"><?php echo $p['HMA'] ?></label>
                   </td>
                </tr>
		             <tr>
                   <td> 
                     <h4><u>Complement d'anamnese</u></h4>
                     <label id="CA"><?php echo $p['CA'] ?></label>
                   </td>
                </tr>
                <tr>
                   <td> 
                     <h4><u>Examen Physique</u></h4>
                     <label id="EP"><?php echo $p['EP'] ?></label>
                   </td>
                </tr>
                <tr>
                   <td> 
                     <h4><u>Diagnostique</u></h4>
                     <label id="D"><?php echo $p['A'] ?></label>
                   </td>
                </tr>
                <?php } ?>
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
 