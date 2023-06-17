<!-- Affichage en SQL -->
<?php

$rs = $conn->query("SELECT patient.id_pa, patient.Nom,  patient.Post_nom, patient.Prenom FROM  consultation, patient WHERE patient.id_pa =consultation.Id_pa   
ORDER BY consultation.Id_consultation DESC LIMIT 5");
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
  <?php while ($p = $rs->fetch()) { ?>
    <tbody>
      <tr>
        <td>
          <a href="../vue/Patient.php?id_pa=<?php echo ($p['id_pa']) ?>"><?php echo ($p['id_pa']) ?></a>
        </td>
        <td>
          <a href="../vue/Patient.php?id_pa=<?php echo ($p['id_pa']) ?> "><?php echo ($p['Nom']) ?></a>
        </td>
        <td>
          <a href="../vue/Patient.php?id_pa=<?php echo ($p['id_pa']) ?>"><?php echo ($p['Post_nom']) ?>
          </a>
        </td>
        <td><a href="../vue/Patient.php?id_pa=<?php echo ($p['id_pa']) ?>"><?php echo ($p['Prenom']) ?></a>
        </td>
      </tr>
    <?php } ?>
    </tbody>
</table>