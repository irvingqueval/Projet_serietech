<?php
include "../header.php";

$id=$_GET['id'];

var_dump($id);

// 2. requete delete from book
$query = "DELETE FROM serie WHERE id = :id";

// prépare la requète
$stm = $pdo->prepare($query);

// configure la valeurs
$stm->bindValue(":id", $id, PDO::PARAM_INT);

// execute la requete sql
$stm->execute();

// revenir sur index.php
//header("location:index.php");