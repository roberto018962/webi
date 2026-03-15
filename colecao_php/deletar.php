<?php
require 'conexao.php'; 

$id = $_GET['id'];

$sql = "DELETE FROM modelo WHERE id = ?";   
$pdo->prepare($sql)->execute([$id]);

header("Location: index.php?sucesso=1");

?>