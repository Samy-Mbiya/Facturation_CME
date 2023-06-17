<?php
require 'Head.php';
require 'Navbar.php';
//require("../modele/Connexion.php");
?><title>Document sans titre</title>
<div class="span9">
  <!-- Contenue
  ================================================== -->
  <section id="dropdowns">
    <div class="page-header">
      <h1>Honoraire </h1>
    </div>
    <div class="bs-docs-example">
      <!-- Information du patient-->
      <?php require("Info_ Patient.php"); ?>
      <p><a href="Patient.php?id_pa=<?php echo $id ?>" id="head"><i class="icon-fast-backward"></i>Retour</a></p>
      <!-- Information du LABO -->
      <?php
      $id = $_GET['id_pa'];
      $Id_con = $_GET['Id_consultation'];
      $date_con=$_GET['date'];
      ?>
      <div class="bs-docs-example" align="left">
        <div id="message"></div>
        <form method="post">

          <!-- Information Consultation -->
        <div>
        <h4> <u>Consultation </u></h4>
        <table class="table table-striped table-bordered">
            <thead>
              <tr>
                <th>Id_cons</th>
                <th> Date</th>
                <th>Medecin</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td> <input Type="text" name="Id_consultation"  id="Id_consultation" value="<?php echo $_GET['Id_consultation'] ?>"> </td>
                <td><?php echo substr ( $_GET['date'] , 0, 8)?></td>
                <td><?php echo $_GET['Pr']?></td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- Honoraire -->
        <div>
          
        <h4> <u>Honoraire</u></h4>
        <div>
           <!-- Ajout -->
          <table>
            <tbody>
            <tr>
                  <td><textarea name="Desc"  id="Desc"> </textarea></td>
                  <td>
                    <input Type="text" name="Prix_autre"  id="Prix_autre">
                  </td>
                  <td>
                    <select name="Type_autre" id="Type_autre">
                      <option value="">Selectionnez svp</option>
                      <option value="Médicament">Médicament</option>
                      <option value="Labo">Labo</option>
                      <option value="Image">Imagérie</option>
                      <option value="Autre">Autre</option>
                    </select>
                  </td>
                  <td>
                    <input type="button" class="btn btn-success" id="ajouterLigne" value="Ajout" align="right"/>
                  </td>
                </tr>
            </tbody>
          </table>
        </div>
          <table class="table table-striped table-bordered" id="Table_Honoraire">
            <thead>
              <tr>
                <th>Description</th>
                 <th>Prix</th>
                 <th>Type</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><input Type="text" name="Cons"  id="cons" value="Consultation"></td>
                <td>
                  <input Type="text" name="Prix"  id="Prix">
                </td>
                <td>
                  <input type="text" value="Consultation" name="Type" id="Type" />
                </td>
              </tr>
              <!-- LABO -->
              <?php
              $aff2 = $conn->query("SELECT * FROM labo WHERE Id_pa='$id' AND Id_cons='$Id_con'");
              while ($t = $aff2->fetch()) {
              ?>
                <tr>
                  <td>
                    <label><?php echo $t['Nom_ex'] ?> <?php echo $t['Type_ex'] ?></label>
                  </td>
                  <td>
                    <input type="text" name="valnorm[]" id="valnorm" value="<?php echo $t['Val_normal']; ?>" />
                  </td> 
                  <td>
                    <input type="text" value="Labo" name="Type" id="Type" />
                  </td>
                </tr>
              <?php } ?>

              <!-- Imagerie -->
              <?php
                $aff2 = $conn->query("SELECT * FROM imagerie WHERE  Id_cons='$Id_con'");
               while ($t = $aff2->fetch()) { ?>
                  <tr>
                    <td><?php echo $t['Exd']; ?></td>
                    <td>
                      <input type="text" name="Priximg[]" id="Priximg" />
                    </td>
                    <td>
                      <input type="text" value="Image" name="Type" id="Type" />
                    </td>
                  </tr>
                <?php } ?>
                <!-- Autre -->
                <tr>
                  <td><input Type="text" name="chambre"  id="chambre" value="Occupation de chambre"></td>
                  <td>
                    <input Type="text" name="Prix"  id="Prix">
                  </td>
                  <td>
                    <input type="text" value="Chambre" name="Type" id="Type" />
                  </td>
                </tr>
                <tr>
                  <td><input Type="text" name="infirmiere"  id="infirmiere" value="Actes et soins infirmières"></td>
                  <td>
                    <input Type="text" name="Prix"  id="Prix">
                  </td>  
                  <td>
                    <input Type="text" value="infirmier" name="Type" id="Type" />
                  </td>
                </tr>
                <tr>
                  <td><input Type="text" name="VM"  id="VM" value="Visite médicale"></td>
                  <td>
                    <input Type="text" name="Prix"  id="Prix">
                  </td>
                  <td>
                    <input Type="text" value="VM" name="Type" id="Type" />
                  </td>
                </tr>
              </tbody>
            </table>
          </div>     
          <div align="right">
            <button class="btn btn-primary" id="Enrg_Fac"><i class="icon-ok-sign"></i> Valider</button>
          </div>
        </form>
      </div>
    </div>
  </section>
</div>
</div>
</div>
<?php
require 'Footer.php';
