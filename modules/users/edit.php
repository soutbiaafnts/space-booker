<?php
require_once '../../includes/auth.php';
require_once '../../config/database.php';

$id = (int)$_GET['id'] ?? 0;

if (!$id) {
    header('Location: list.php');
    exit;
}

if ($id != $_SESSION['user_id']) {
    header('Location: list.php?error=wrongUser');
    exit;
}

$pdo = connect();

$stmt = $pdo->prepare("SELECT id, name, email FROM users WHERE id = ?");
$stmt->execute([$id]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header('Location: list.php?error=emptyUser');
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuário</title>
    <link rel="stylesheet" href="../../assets/css/form/form.css">
    <script src="../../assets/js/alerts.js"></script>
</head>

<body>
    <?php require_once '../../includes/nav.php' ?>
    <main>
        <div class="container">
            <div class="form-block">
                <h1>Editar usuário</h1>
                <form action="update.php" method="post">

                    <div class="input-block">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">

                        <div class="input-box">
                            <input type="text" placeholder="Seu nome" name="name" id="name" value="<?= $user['name'] ?>" required>
                        </div>

                        <div class="input-box">
                            <input type="email" placeholder="Seu e-mail" name="email" id="email" value="<?= $user['email'] ?>" required>
                        </div>
                    </div>

                    <button type="submit" class="btn">Editar</button>
                </form>
            </div>
        </div>
    </main>
</body>

</html>