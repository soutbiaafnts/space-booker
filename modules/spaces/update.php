<?php
require_once '../../includes/auth.php';
require_once '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: list.php');
    exit;
}

$id = $_POST['id'] ?? null;
$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? null;
$location = $_POST['location'] ?? null;
$capacity = $_POST['capacity'] ?? null;

if (!$id || empty($name)) {
    header('Location: list.php');
    exit;
}

try {
    $pdo = connect();

    $stmt = $pdo->prepare("
    UPDATE spaces
    SET name = ?, description = ?, location = ?, capacity = ?
    WHERE id = ?
    ");

    $stmt->execute([
        $name,
        $description,
        $location,
        $capacity,
        $id
    ]);

    header('Location: list.php');
    exit;
} catch (Exception $e) {
    header('Location: list.php?error=1');
    exit;
}