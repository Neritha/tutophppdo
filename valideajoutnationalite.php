<?php include "header.php";
include "connextionPDO.php";

$libelle = $_POST['libelle'];

$req=$monPdo->prepare("insert into nationalite(libelle) values(:libelle)");
$req->bindParam(':libelle', $libelle);
$nb=$req->execute();

echo '<div class="conterner"> mt-5</div>'; //vidéo 20:29

?>

if()

<?php include "footer.php" ?>