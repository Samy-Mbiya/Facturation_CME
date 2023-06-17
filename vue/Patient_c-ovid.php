<?php
require 'Head.php';
require 'Navbar.php';
?>
<div class="span9">
  <!-- Contenue
        ================================================== -->
  <section id="dropdowns">
    <div class="page-header">
      <h1>Examen</h1>
    </div>

    <div style="margin-bottom:30px;" id="RP">
      <h3>Recherche du Patient</h3>
      <form method="post" class="form">
        <input type="text" class="search-query" placeholder="Nom Patient" id="NP" name="N_P">
        <input type="text" class="search-query" placeholder="Postnom Patient" id="PNP" name="PN_P">
        <button class="btn" id="Recherche">Recherche </button>
        <input type="text" name="code" id="code" value="2" style="visibility:collapse" />

       </form>
          <h3>Information du Patient</h3>
          <?php require 'Info_ Patient.php'; ?>

        </div>
        <?php

$rs = $conn->query("SELECT * FROM covid ");
?>
<!-- Affichage de liste des Patient -->
<table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
  <thead>
    <tr>
      <th>#</th>
      <th>Nom</th>
      <th>Post-Nom</th>
      <th>Prenom</th>
    </tr>
  </thead>
  <?php while ($p = $rs->fetch()) { 
    ?>
    <tbody>
      
    <?php } ?>
    </tbody>
</table>
      </div>
     </section>
    </div>
  </div>
</div>
<?php require 'Footer.php';
