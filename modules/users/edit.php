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
    <title>Editar Usuário</title>
</head>

<body>
    <header>
        <h1>Editar meu Usuário</h1>
    </header>
    <main>
        <form action="update.php" method="post">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">

            <label for="name">Nome</label>
            <input type="text" name="name" id="name" value="<?= $user['name'] ?>" required><br><br>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" value="<?= $user['email'] ?>" required>

            <button type="submit">Editar</button>
        </form>
    </main>
    <footer>
        DEW I - Trabalho Final - Bianca Fontes
    </footer>
</body>

</html>