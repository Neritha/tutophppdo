<?php include "header.php";
include "connextionPDO.php";

$num=$_GET['num'];

$req=$monPdo->prepare("delete from nationalite where num = :num");
$req->bindParam(':num', $num);
$nb=$req->execute();

if($nb == 1) {
    $_SESSION['message']=["success"=>"La nationalite a bien été suprimée"];
}else{
    $_SESSION['message']=["danger"=>"La nationalite n\'a pas été suprimée"];
}

header('location: listeNationalites.php');
exit();

?>
