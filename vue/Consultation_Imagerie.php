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
      <h3> <u>IMAGERIE</u></h3>
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

        <h4><u>Imagerie</u></h4>
        <!-- Information Examen Pratique -->
        <?php
        $aff2 = $conn->query("
                      SELECT * FROM imagerie WHERE Id_cons='$id_consultation'");
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
