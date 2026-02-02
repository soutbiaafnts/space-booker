<?php
require_once '../../includes/auth.php';
require_once '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: list.php');
    exit;
}

$id = (int)($_POST['id'] ?? 0);

if (!$id || $id != $_SESSION['user_id']) {
    header('Location: list.php?error=wrongUser');
    exit;
}

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';

if (!$name || !$email) {
    header('Location: edit.php?id=$id&error=emptyFields');
    exit;
}

try {
    $pdo = connect();

    $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
    $stmt->execute([
        $name,
        $email,
        $id
    ]);

    header('Location: list.php?success=updated');
    exit;
} catch (Exception $e) {
    header('Location: edit.php?id=$id&error=internal');
    exit;
}