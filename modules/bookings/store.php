<?php
require_once "../../includes/auth.php";
require_once "../../config/database.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: create.php');
    exit;
}

$user_id = $_SESSION['user_id'];
$space_id = $_POST['space_id'] ?? null;
$booking_date = $_POST['booking_date'] ?? null;
$start_time = $_POST['start_time'] ?? null;
$end_time = $_POST['end_time'] ?? null;

if (!$space_id || !$booking_date || !$start_time || !$end_time) {
    header('Location: create.php?error=1');
    exit;
}

try {
    $pdo = connect();

    // verificação de conflito (mesmo espaço, mesma data, horário sobreposto, reserva já ativa)
    $conflictStmt = $pdo->prepare("
    SELECT id
    FROM bookings
    WHERE space_id = ?
        AND booking_date = ?
        AND status = 'active'
        AND start_time < ?
        AND end_time > ?
    ");

    $conflictStmt->execute([
        $space_id,
        $booking_date,
        $end_time,
        $start_time
    ]);

    if ($conflictStmt->rowCount() > 0) {
        header('Location: create.php?error=conflict');
        exit;
    }

    // insere a reserva
    $stmt = $pdo->prepare("
    INSERT INTO bookings (user_id, space_id, booking_date, start_time, end_time, status)
    VALUES (?, ?, ?, ?, ?, 'active')    
    ");

    $stmt->execute([
        $user_id,
        $space_id,
        $booking_date,
        $start_time,
        $end_time
    ]);

    header('Location: list.php');
    exit;
} catch (Exception $e) {
    header('Location: create.php?error=internal');
    exit;
}
