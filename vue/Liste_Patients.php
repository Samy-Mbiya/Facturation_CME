<?php
require 'Head.php';
require 'Navbar.php';
?>
<div class="span9">
  <!-- Contenue
        ================================================== -->
  <section id="dropdowns">
    <div class="page-header">
      <h1>Liste des Patients</h1>
    </div>

    <div style="margin-bottom:30px;" id="RP">
      <h3>Recherche du Patient</h3>
      <form method="post" class="form">
        <input type="text" class="search-query" placeholder="Nom Patient" id="NP" name="N_P">
        <input type="text" class="search-query" placeholder="Postnom Patient" id="PNP" name="PN_P">
        <button class="btn" id="Recherche">Recherche </button>
        <input type="text" name="code" id="code" value="2" style="visibility:collapse" />

      </form>
    </div>
    <div id="Liste_Patient"></div> <!-- Affiche la liste des patients-->
    <div id="message"></div> <!-- Affiche la liste des patients Rechercher-->
</div>
</section>
</div>
</div>

</div>
<?php require 'Footer.php';
