<?php
require_once '../includes/auth.php';
require_once '../config/database.php';

$pdo = connect();
$stmt = $pdo->prepare("SELECT id, name, email FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    header('Location: logout.php');
    exit;
}

$success = $_GET['success'] ?? null;
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SpaceBooker</title>
    <link rel="stylesheet" href="../assets/css/dashboard/style.css">
</head>

<body>
    <?php require_once '../includes/navDash.php' ?>
    
    <main>
        <div class="center-info">
            <h1>Olá, <?= htmlspecialchars($user['name']) ?>!</h1>
            <?php if ($success === 'registered'): ?>
                <script>
                    alert('Usuário cadastrado com sucesso!');
                </script>
            <?php endif; ?>
            <p>Use o menu de navegação à esquerda</p>
        </div>
    </main>
</body>

</html>