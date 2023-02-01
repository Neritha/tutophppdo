<?php
$hostnom = 'host=btssio.dedyn.io';
$usernom = 'CARREVIC';
$password = '16/01/2004';
$bdd = 'CARREVIC_bibliotheque';

try {
    $monPdo = new PDO("mysql:$hostnom;dbname=$bdd;charset=utf8", $usernom, $password);
    $monPdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
    $monPdo = null;
}
?>