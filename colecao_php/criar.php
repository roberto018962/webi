<?php

require 'conexao.php'; 

$modelo= $_POST['modelo'];
$marca_id = $_POST['marca_id'];

$sql = "INSERT INTO modelo (titulo, marca_id) VALUES (?, ?)";
$pdo->prepare($sql)->execute([$modelo, $marca_id]);

header("Location: index.php?sucesso=1");

?>