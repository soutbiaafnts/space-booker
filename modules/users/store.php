<?php
require_once "../../includes/auth.php";
require_once "../../config/database.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: create.php');
    exit;
}

$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$password_rep = $_POST['password_rep'] ?? null;

// validação básica
if (!$name || !$email || !$password || !$password_rep) {
    header('Location: create.php?error=empty');
    exit;
}

try {
    $pdo = connect();

    // verifica se email já exite
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        header('Location: create.php?error=email');
        exit;
    }

    // hash da senha
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // insere user
    $stmt = $pdo->prepare("
        INSERT INTO users (name, email, password, role)
        VALUES (?, ?, ?, 'user')
    ");

    $stmt->execute([
        $name,
        $email,
        $hashedPassword
    ]);

    header('Location: list.php?success=1');
    exit;

} catch (Exception $e) {
    header('Location: create.php?error=internal');
    exit;
}