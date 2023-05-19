<?php
session_start();
$num_pharma=$_SESSION['num_pharmacie'];
require_once 'connect_BD.php';
$stmt = $connect->prepare("SELECT * from medicaments join stock on medicaments.id_medicament=stock.id_medicament and stock.num_pharmacie=$num_pharma");
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_OBJ);
echo json_encode($results);
?>