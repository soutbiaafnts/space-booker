<?php
require_once '../../includes/auth.php';
require_once '../../config/database.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: list.php');
    exit;
}

$pdo = connect();

$stmt = $pdo->prepare("SELECT * FROM spaces WHERE id = ?");
$stmt->execute([$id]);
$space = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$space) {
    header('Location: list.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Espaço</title>
</head>

<body>
    <header>
        <h1>Editar Espaço</h1>
    </header>
    <main>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $space['id'] ?>">

            <label for="name">Nome do espaço</label>
            <input type="text" name="name" id="name" value="<?= $space['name'] ?>" required><br><br>


            <label for="description">Descrição</label>
            <textarea name="description" id="description"><?= $space['description'] ?></textarea><br><br>

            <label for=" location">Local</label>
            <input type="text" name="location" id="location" value="<?= $space['location'] ?>"><br><br>

            <label for="capacity">Capacidade</label>
            <input type="number" name="capacity" id="capacity" value="<?= $space['capacity'] ?>"><br><br>

            <button type="submit">Atualizar</button>
        </form>
    </main>
    <footer>
        DEW I - Trabalho Final - Bianca Fontes
    </footer>
</body>

</html>