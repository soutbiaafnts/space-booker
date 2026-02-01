<?php
require_once '../../includes/auth.php';
require_once '../../config/database.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: list.php');
    exit;
}

try {
    $pdo = connect();

    $stmt = $pdo->prepare("DELETE FROM spaces WHERE id = ?");
    $stmt->execute([$id]);

    header('Location: list.php');
    exit;
} catch (Exception $e) {
    header('Location: list.php?error=1');
    exit;
}