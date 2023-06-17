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
              $Id_covid=$_GET['Id_covid'];
              $aff1 = $conn->query("SELECT * FROM  covid WHERE Id_covid='$Id_covid' "); ?>
           <!-- Consultation
                  +++++++++++++++++++-->
           <!-- Recherche-->
         <table class="table">
           <thead>
             <tr>
               <th>Description</th>
               <th>Résultat</th>
               <th></th>
               <th>Action</th>
           </thead>
           <tbody>
             <?php while ($p = $aff1->fetch()) { ?>
              <form method="POST">
              <tr>
                <td>
                  <input type="text" name="Description" id="Description" value="<?php echo ($p['Description']) ?>"> 
                </td>
                <td>
                  <?php 
                      $defaut=$p['resultat'];
                      if ($defaut=="Négatif") {
                        ?>
                          <select name="resultat" id="resultat">
                            <option value="NEGATIF">NEGATIF</option>
                            <option value="POSITIF">POSITIF</option>
                          </select>
                   <?php
                      }if($defaut=="Positif") {?>
                        <select name="resultat" id="resultat">
                            <option value="POSITIF">POSITIF</option>
                            <option value="NEGATIF">NEGATIF</option>
                          </select><?php 
                      } if ($defaut!="Négatif" && $defaut!="Positif") {
                        
                      ?>
                        <select name="resultat" id="resultat">
                          <option value="choix">-Selection-</option>
                          <option value="NEGATIF">NEGATIF</option>
                          <option value="POSITIF">POSITIF</option>
                        </select>

                     <?php  }
                      
                    ?>
                </td>
                <td>
                  <input style="width:10px; visibility:collapse" value="5" name="code" id="code" />
                  <input style="width:10px; visibility:collapse" value="<?php echo $id ?>" name="id_pa" id="id_pa" />
                  <input style="width:10px; visibility:collapse" value="<?php echo $p['Id_covid'] ?>" name="Id_covid" id="Id_covid" />
                  <input style="width:10px; visibility:collapse" value="<?php echo $_SESSION['User'] ?>" name="id_user_labo" id="id_user_labo" /> </td>
                <td>
                    <button type="submit" id="E_covid">Valider</button>
                </td>
              </tr>
              </form>
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
