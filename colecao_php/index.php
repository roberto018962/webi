<?php
require 'conexao.php'; 

$sql = "SELECT modelo.id, marca.nome, modelo.titulo from modelo  
        JOIN marca ON marca.id = modelo.marca_id";
$modelos = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <title>CRUD PHP/MariaDB</title>
</head>
<body>
    
<h2>Lista de Veículos</h2>
    <table border="1">
        <tr>
            <th>Id</th>
            <th>Marca</th>
            <th>Modelo</th>
        </tr>
        <?php foreach($modelos as $t): ?>
        <tr>
            <td><?= $t['id'] ?></td>
            <td><?= $t['nome'] ?></td>
            <td><?= $t['titulo'] ?></td>
            <td>
                <a href="deletar.php?id=<?= $t['id'] ?>" onclick="return confirm('Excluir?')">Excluir</a>
            </td>
            <td>
                <a href="alterar.php?id=<?= $t['id'] ?>">Alterar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="tela_criar.php">Adicionar</a>
</body>
</html>