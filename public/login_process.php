<?php
session_start();
require_once '../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: login.php');
    exit();
}

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

try {
    $pdo = connect();

    $stmt = $pdo->prepare('SELECT id, password FROM users WHERE email = ?');
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    /*! comparação direta temporária */
    if ($user && $password === $user['password']) {
        $_SESSION['user_id'] = $user['id'];
        header("Location: dashboard.php");
        exit();
    }

    header('Location: login.php?error=1');
    exit();
} catch (Exception $e) {
    header('Location: login.php?error=1');
    exit();
}