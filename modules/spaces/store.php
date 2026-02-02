<?php
require_once '../../includes/auth.php';
require_once '../../config/database.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: list.php');
    exit();
}

$name = $_POST['name'] ?? '';
$description = $_POST['description'] ?? null;
$location = $_POST['location'] ?? null;
$capacity = $_POST['capacity'] ?? null;

// validação mínima
if (empty($name)) {
    header('Location: create.php?error=emptyName');
    exit;
}

try {
    $pdo = connect();

    $stmt = $pdo->prepare("
    INSERT INTO spaces(name, description, location, capacity)
    VALUES (?, ?, ?, ?)
    ");

    $stmt->execute([
        $name,
        $description,
        $location,
        $capacity
    ]);

    header('Location: list.php?success=created');
    exit;
} catch (Exception $e) {
    header('Location: create.php?error=internal');
    exit;
}
