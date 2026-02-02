<?php
require_once "../../includes/auth.php";
require_once "../../config/database.php";

$id = $_GET['id'] ?? null;
$user_id = $_SESSION['user_id'];

if (!$id) {
    header('Location: list.php');
    exit;
}

try {
    $pdo = connect();

    $stmt = $pdo->prepare("
        UPDATE bookings
        SET status = 'cancelled'
        WHERE id = ?
            AND user_id = ?
            AND status = 'active'
    ");

    $stmt->execute([$id, $user_id]);

    header('Location: list.php?success=cancelled');
    exit;
} catch (Exception $e) {
    header('Location: list.php?error=internal');
    exit;
}