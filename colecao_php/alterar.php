<?php
require 'conexao.php'; 


$id = $_GET['id'] ?? null;

$sqlModelo = "SELECT id, titulo, marca_id FROM modelo WHERE id = ?";
$stmt = $pdo->prepare($sqlModelo);
$stmt->execute([$id]);
$modeloAtual = $stmt->fetch(PDO::FETCH_ASSOC);


$marcas = $pdo->query("SELECT * FROM marca")->fetchAll(PDO::FETCH_ASSOC); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_post = $_POST['id'];
    $titulo = $_POST['modelo'];
    $marca_id = $_POST['marca_id'];

    $sqlUp = "UPDATE modelo SET titulo = ?, marca_id = ? WHERE id = ?";
    $pdo->prepare($sqlUp)->execute([$titulo, $marca_id, $id_post]);
    
    header("Location: index.php?sucesso=editado");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Modelo</title>
</head>
<body>
    <h2>Alterar Modelo</h2>
    
    <form action="alterar.php" method="POST">
        <input type="hidden" name="id" value="<?= $modeloAtual['id'] ?>">

        <label>Modelo:</label>
        <input type="text" name="modelo" value="<?= htmlspecialchars($modeloAtual['titulo']) ?>" required>
        
        <label>Marca:</label>
        <select name="marca_id" required>
            <?php foreach($marcas as $m): ?>
                <option value="<?= $m['id'] ?>" <?= $m['id'] == $modeloAtual['marca_id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($m['nome']) ?>
                </option>
            <?php endforeach; ?>
        </select>
        
        <button type="submit">Salvar Alterações</button>
    </form>
</body>
</html>