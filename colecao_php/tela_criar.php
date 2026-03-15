<?php
require 'conexao.php'; 

$sql = "SELECT * FROM marca";
$marcas = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC); 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRUD PHP/MariaDB</title>
</head>
<body>
    <h2>Novo Modelo</h2>
    
    <form action="criar.php" method="POST">
        
        <input type="text" name="modelo" placeholder="Nome do Modelo" required>
        
        <select name="marca_id" required>
            <option value="">Selecione uma marca</option>
            <?php foreach($marcas as $m): ?>
                <option value="<?= $m['id'] ?>">
                    <?= htmlspecialchars($m['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <button type="submit" name="adicionar">Salvar</button>
    </form>
</body>
</html>