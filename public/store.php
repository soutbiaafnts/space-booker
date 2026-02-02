<?php
require_once "../config/database.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: register.php');
    exit;
}

$name = $_POST['name'] ?? null;
$email = $_POST['email'] ?? null;
$password = $_POST['password'] ?? null;
$password_rep = $_POST['password_rep'] ?? null;

// validação básica
if (!$name || !$email || !$password || !$password_rep) {
    header('Location: register.php?error=emptyFields');
    exit;
}

try {
    $pdo = connect();

    // verifica se email já exite
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $stmt->execute([$email]);

    if ($stmt->rowCount() > 0) {
        header('Location: register.php?error=existentEmail');
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

    header('Location: dashboard.php?success=registered');
    exit;

} catch (Exception $e) {
    header('Location: register.php?error=internal');
    exit;
}