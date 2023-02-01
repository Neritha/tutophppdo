<?php include "header.php";
include "connextionPDO.php";
$req=$monPdo->prepare("select * from nationalite");
$req->setFetchMode(PDO::FETCH_OBJ);
$req->execute();
$LesNationalites = $req->fetchAll();
?>

<main role="main">


<div class="container mt-5">

    <div class="row pt-3">
        <div class="col-9">
            <h1>Bonjour,</h1>
            <h2>Voici la liste des nationalités : </h2>
        </div>
        <div class="col-3">
            <a href="#" class='btn btn-info'><i class="fa-solid fa-square-plus"></i> créé une nationalité</a>
        </div>
    </div>

    <table class="table table-success">
        <thead>
            <tr>
            <th scope="col">Numéro</th>
            <th scope="col">Libellé</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach($LesNationalites as $nationalite){
                echo "<tr>";
                
                echo "<td>$nationalite->num</td>";
                echo "<td>$nationalite->libelle</td>";
                echo "<td> 
                    <a href='#' class='btn btn-success'><i class='fa-solid fa-pencil'></i></i></a>
                    <a href='#' class='btn btn-danger'><i class='fa-regular fa-circle-xmark'></i></a>
                </td>";

                echo "</tr>";
            }
            ?>
        </tbody>
    </table>

</div>

</main>

<?php include "footer.php" ?>