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
      <div class="text-center">
        <h1> CENTRE MEDICAL DE L’ESPOIR </h1>
        <div><em>5 bis, avenue Mont des Arts C/Lingwala</em></div>
        <div> <em>Phone : (+243)812902286-815203932</em> </div>
        <div><em>cliniquedelespoir01@gmail.com et michelmusafiri@gmail.com</em></div>
        <div><em>www.clinique-de-l-espoir.org</em></div>
      </div>
    </div>
    <div class="text-center">
      <h3> <u>DETAIL DE LA CONSULTATION</u></h3>
    </div>
    <div>
      <h4><u>Information du patient</u></h4>

      <!-- Information du patient-->
      <?php
      require("Info_ Patient.php");
      $id = $_GET['id_pa'];
      $id_consultation = $_GET['Id_consultation'];
      $aff1 = $conn->query("SELECT * FROM  consultation, personnel WHERE consultation.Id_pa='$id' AND consultation.Id_pr=personnel.Id_pr AND consultation.Id_consultation='$id_consultation' ORDER BY consultation.Id_consultation DESC ");
      ?>
      <!-- Affichage de la consultation -->
      <div id="NCAff"></div>
      <div id="IFP">
        <p><a href="Patient.php?id_pa=<?php echo $id ?>" id="head"><i class="icon-fast-backward"></i>Retour</a></p>
        <h4><u>Connsultation</u></h4>
        Consultation faite par Docteur <b><?php echo $_GET['Pr'] ?></b>
        le <?php
            $Date = substr($_GET['date'], 0, 8);

            echo $Date . ' vers ' . $_GET['heure'] ?></p>
        <div id="myTabContent" class="tab-content">
          <div class="tab-pane fade in active" id="sv">
            <p>
            <table class="table-hover">
              <tbody>
                </tr>
                <?php while ($p = $aff1->fetch()) { ?>
                  <tr>
                    <td>
                      <h5><u>Symtome dominant</u></h5>
                      <label id="SD"><?php echo $p['s'] ?></label>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5><u>ATCD</u></h5>
                      <label id="ATCD"><?php echo $p['ATCD'] ?></label>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5><u>Histoire de la maladie</u></h5>
                      <label id="CA"><?php echo $p['HMA'] ?></label>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5><u>Complement d'anamnese</u></h5>
                      <label id="CA"><?php echo $p['CA'] ?></label>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5><u>Examen Physique</u></h5>
                      <label id="EP"><?php echo $p['EP'] ?></label>
                    </td>
                  </tr>
                  <tr>
                    <td>
                      <h5><u>Diagnostique</u></h5>
                      <label id="D"><?php echo $p['A'] ?></label>
                    </td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>

            <!-- Affichage de la Evolution  -->
            <h4><u>Evolution</u></h4>
            <div class="tab-pane fade in active" id="sv">
              <p>
              <table class="table table-striped table-bordered">
                <thead>
                  <th>Symtome dominant</th>
                  <th>Histoire de la maladie</th>
                  <th>Complement d'anamnese</th>
                  <th>Examen Physique</th>
                  <th>Diagnostique</th>
                </thead>
                <tbody>

                  <?php
                  $aff2 = $conn->query("SELECT * FROM  evolution, personnel WHERE evolution.Id_pa='$id' AND evolution.Id_pr =personnel.Id_pr AND evolution.Id_con='$id_consultation' ORDER BY evolution.Id_ev DESC");
                  while ($p2 = $aff2->fetch()) { ?>
                    <tr>
                      <td>
                        <label id="SD"><?php echo $p2['S'] ?></label>
                      </td>
                      <td>
                        <label id="CA"><?php echo $p2['HMA'] ?></label>
                      </td>
                      <td>
                        <label id="CA"><?php echo $p2['CA'] ?></label>
                      </td>
                      <td>
                        <label id="EP"><?php echo $p2['EP'] ?></label>
                      </td>
                      <td>
                        <label id="D"><?php echo $p2['A'] ?></label>
                      </td>
                    </tr>

                  <?php } ?>
                </tbody>
              </table>

              <h4><u>Examen Paraclinique</u></h4>
              <!-- Information Examen Pratique -->
              <?php
              $aff2 = $conn->query("
                      SELECT * FROM labo WHERE Id_pa='$id' AND Id_cons='$id_consultation'");
              ?>
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>Type de l'examen</th>
                    <th> Valeur labo</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($t = $aff2->fetch()) { ?>
                    <tr>
                      <td><?php echo $t['Type_ex']; ?></td>
                      <td><?php echo $t['Valeur']; ?></td>
                    </tr>
                  <?php } ?>

                </tbody>
              </table>
              </p>
            </div>


            <h4><u>Imagerie</u></h4>
            <!-- Information Imagerie -->
            <?php
            $aff2 = $conn->query("
                      SELECT * FROM imagerie WHERE  Id_cons='$id_consultation'");
            ?>
            <table class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th>Examen Demander</th>
                  <th> Rec</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($t = $aff2->fetch()) { ?>
                  <tr>
                    <td><?php echo $t['Exd']; ?></td>
                    <td><?php echo $t['Rec']; ?></td>
                  </tr>
                <?php } ?>

              </tbody>
            </table>
            </p>
          </div>

          <!-- Traitement
        +++++++++++++++++++-->
          <h4><u>Traitement</u></h4>
          <p>
          <div id="message"></div>
          <table>
            <form method="post">
              <tr>
                <td>
                  <input style="width:10px; visibility:collapse" value="<?php echo $id ?>" name="id_p" id="id_pp" />
                  <input style="width:10px; visibility:collapse" value="<?php echo $id_consultation ?>" name="id_cons" id="id_cons" />
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
          $aff3 = $conn->query("
                    SELECT * FROM traitement WHERE Id_pa='$id' AND Id_cons='$id_consultation'");
          ?>
          <table class="table table-striped table-bordered">
            <thead>
              <th>Medicament</th>
            </thead>
            <tbody>
              <?php while ($t1 = $aff3->fetch()) { ?>
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
