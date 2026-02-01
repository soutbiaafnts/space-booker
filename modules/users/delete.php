<?php
require_once '../../includes/auth.php';
require_once '../../config/database.php';

$id = (int)($_GET['id'] ?? 0);

if (!$id || $id != $_SESSION['user_id']) {
    header('Location: list.php?error=wrongUser');
    exit;
}

try {
    $pdo = connect();

    $stmt = $pdo->prepare("SELECT id, name, email FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        header('Location: list.php?error=emptyUser');
        exit;
    }

    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: list.php?success=deleted');
    exit;
} catch (Exception $e) {
    header('Location: list.php?error=internal');
    exit;
}
