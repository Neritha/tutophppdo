<?php include "header.php";
include "connextionPDO.php";

$libelle = $_POST['libelle'];

$req=$monPdo->prepare("select * from nationalite");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$LesNationalites = $req->fetchAll();
?>

<div class="conterner"> mt-5</div>

<?php include "footer.php" ?>