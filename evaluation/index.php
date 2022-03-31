<?php include 'config.php' ?>
<!DOCTYPE html>
<html lang="fr">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Evaluation</title>
<meta name="description" content="" />
<link href="dist/css/bootstrap.min.css" rel="stylesheet">

<link href="dist/css/style.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.css"/>
<link href="../evaluation/favicon.ico" rel="icon" type="image/x-icon" />

</head>
<body>
<section class="container mt-4">
<div class="row">

<!--  button "Request AJAX data"
 --><button id="button1"  type="button" onclick="loadDoc()">Request AJAX data</button>

<table id="#dtBasicExample"  class="table table-striped table-bordered table-sm" >
<thead>
<tr>
<th class="th-sm">Nom Produit</th>
<th class="th-sm">Date d'ajout</th>
<th class="th-sm">Depuis <small>(en jours)</small></th>
<th class="th-sm">Stock</th>
<th class="th-sm">Chiffre d'affaire</th>
</tr>
</thead>
<tbody>
<?php
$selectPrd=$bdd->prepare("SELECT * FROM produits");
$selectPrd->execute(array());
while ($prd = $selectPrd->fetch(PDO::FETCH_OBJ)){

$dateOrigine = new DateTime($prd->dateAjout);
$maintenant = new DateTime("now");
$nbJour = date_diff($dateOrigine, $maintenant);

$stockAff = 0;
$ca = 0;

$selectStock=$bdd->prepare("SELECT * FROM stock WHERE idPrd = ?");
$selectStock->execute(array($prd->idPrd));
while ($stock = $selectStock->fetch(PDO::FETCH_OBJ)){
if($stock->type == "stock"){
$stockAff = $stockAff + $stock->qt;
}
elseif ($stock->type == "vente") {
$stockAff = $stockAff - $stock->qt;
$ca = $ca + ($prd->prix * $stock->qt);
}
}

?>

<tr> 
<td><?= $prd->nom  ?></td>
<td><?= date("d/m/Y", strtotime($prd->dateAjout))  ?></td>
<td><?= $nbJour->format('%a jour(s)') ?></td>
<td><?= $stockAff  ?></td>
<td><?= $ca ?> €</td></tr>

<script> /* la fonction autoload pour le bouton "Request AJAX data" */
function loadDoc() {
  const xhttp = new XMLHttpRequest();
  
  xhttp.onload = function() {
    document.getElementById("#dtBasicExample").innerHTML = this.responseText;
  }
  
  xhttp.open("GET", "evaluation.sql");
  
}
</script>

<?php
}

?>
</tbody>
</table>
</div>
</section>
<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.5/datatables.min.js"></script>

<script>/* la fonction bootstrap de tri croissant/décroissant du tableau*/
  
	$(document).ready(function () {
    window.alert("ready!"); /* pour le test de "document ready" */
  $('#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});

</script>

</body>
</html>