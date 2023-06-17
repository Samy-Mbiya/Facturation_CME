 <?php
  require 'Head.php';
  require 'Navbar.php';

  ?>
 <div class="span9">
   <!-- Contenue
        ================================================== -->
   <section id="dropdowns">
     <div class="page-header">
       <h1>Information et Examen du Patient</h1>
     </div>
     <div class="bs-docs-example">
       <!-- Information du patient-->
       <h4><u>Information du Patient</u></h4>
       <?php require 'Info_ Patient.php'; ?>
       <div>
         <div>
           <h4><u>Liste des examens </u></h4>
         </div>
         <p>
           <?php 
              $aff1 = $conn->query("SELECT * FROM  covid WHERE covid.Id_pa='$id'  ORDER BY covid.Id_covid DESC "); ?>
           <!-- Consultation
                  +++++++++++++++++++-->
           <!-- Recherche-->
         <table class="table">
           <thead>
             <tr>
               <th>#</th>
               <th>Date</th>
               <th>Description</th>
               <th>Résultat</th>
           </thead>
           <tbody>
             <?php while ($p = $aff1->fetch()) { ?>
              <tr>
                <td>
                <a href="Patient_covid_valeur.php?id_pa=<?php echo ($p['Id_pa']) ?>&Id_covid=<?php echo $p['Id_covid'] ?> ">
                  <?php echo ($p['Id_covid']) ?> 
                </a>
                </td>
                <td>
                  <a href="Patient_covid_valeur.php?id_pa=<?php echo ($p['Id_pa']) ?>&Id_covid=<?php echo $p['Id_covid'] ?> ">
                   <?php echo ($p['date']) ?>
                  </a>  
                </td>
                <td>
                 <a href="Patient_covid_valeur.php?id_pa=<?php echo ($p['Id_pa']) ?>&Id_covid=<?php echo $p['Id_covid'] ?> ">
                  <?php echo ($p['Description']) ?>
                </a>
                </td>
                 <td>
                 <a href="Patient_covid_valeur.php?id_pa=<?php echo ($p['Id_pa']) ?>&Id_covid=<?php echo $p['Id_covid'] ?> ">
                  <?php echo ($p['resultat']) ?>
                </a>
                </td>
              </tr>
             <?php } ?>
             </tr>
           </tbody>
         </table>
          <div id="message"></div>
         </p>
       </div>
     </div>
 </div>
 </div>
 </section>
 </div>
 <?php
  require 'Footer.php';
