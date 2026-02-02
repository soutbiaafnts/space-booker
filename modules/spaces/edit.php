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
    <title>Espaço</title>
    <link rel="stylesheet" href="../../assets/css/form/form.css">
</head>

<body>
    <?php require_once '../../includes/nav.php' ?>
    <main>
        <div class="container">
            <div class="form-block">
                <h1>Editar espaço</h1>

                <form action="update.php" method="post">
                    <input type="hidden" name="id" value="<?= $space['id'] ?>">

                    <div class="input-block">
                        <div class="input-box">
                            <input type="text" placeholder="Nome do espaço" name="name" id="name" value="<?= $space['name'] ?>" required>
                        </div>

                        <div class="input-box">
                            <input type="text" name="description" placeholder="Descreva o espaço" id="description" value="<?= $space['description'] ?>">
                        </div>

                        <div class="input-box">
                            <input type="text" placeholder="Local" name="location" id="location" value="<?= $space['location'] ?>">
                        </div>

                        <div class="input-box">
                            <input type="number" placeholder="Capacidade" name="capacity" id="capacity" value="<?= $space['capacity'] ?>">
                        </div>
                    </div>

                    <button type="submit" class="btn">Atualizar</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>