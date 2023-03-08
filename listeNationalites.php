<?php include "header.php";
include "connextionPDO.php";
$req=$monPdo->prepare("select * from nationalite");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$LesNationalites = $req->fetchAll();

if(!empty($_SESSION['message'])){
    $mesMessages=$_SESSION['message'];
    foreach($mesMessages as $key=>$message){
        echo '<div class="container pt-5"> <div class="alert alert-' . $key . ' alert-dismissible fade show" role="alert">' . $message . '
         You should check in on some of those fields below.
         <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
         </div>
         </div>';
    }
    $_SESSION['message']=[];
}

?>

<main role="main">


<div class="container mt-5">

    <div class="row pt-3">
        <div class="col-9">
            <h1>Bonjour,</h1>
            <h2>Voici la liste des nationalités : </h2>
        </div>
        <div class="col-3">
            <a href="formulaireNationalite.php?action=Ajouter" class='btn btn-info'><i class="fa-solid fa-square-plus"></i> créé une nationalité</a>
        </div>
    </div>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
            <th scope="col" calss="col-md-2">Numéro</th>
            <th scope="col" calss="col-md-8">Libellé</th>
            <th scope="col" calss="col-md-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($LesNationalites as $nationalite){
                echo "<tr>";
                
                echo "<td class='col-md-2'>$nationalite->num</td>";
                echo "<td class='col-md-8'>$nationalite->libelle</td>";
                echo "<td class='col-md-2'> 
                    <a href='formulaireNationalite.php?action=Modifier&num=$nationalite->num'class='btn btn-success'><i class='fa-solid fa-pencil'></i></a>
                    <a href='#modalsup' data-suppression='suprimerNationalite.php?num=$nationalite->num' data-toggle='modal' class='btn btn-danger'><i class='fa-regular fa-circle-xmark'></i></a>
                </td>";

                echo "</tr>";
            }
            //
            ?>
        </tbody>
    </table>



</div>


<div id="modalsup" class="modal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Confirmation suppression</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Supprimer cette nationalité ?</p>
      </div>
      <div class="modal-footer">
        <a href="" class="btn btn-primary" id=btnSupppr>supprimer</a>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

</main>

<?php include "footer.php" ?>