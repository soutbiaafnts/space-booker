<?php
require_once '../../includes/auth.php';
require_once '../../config/database.php';

$pdo = connect();

$stmt = $pdo->query("
     SELECT 
        bookings.id,
        users.name AS user_name,
        spaces.name AS space_name,
        bookings.booking_date,
        bookings.start_time,
        bookings.end_time,
        bookings.status
    FROM bookings
    JOIN spaces ON spaces.id = bookings.space_id
    JOIN users ON users.id = bookings.user_id
    ORDER BY bookings.booking_date DESC
");
$bookings = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas</title>
    <link rel="stylesheet" href="../../assets/css/table/table.css">
</head>

<body>
    <?php require_once '../../includes/nav.php' ?>
    <main class="container">
        <div class="head">
            <h1>Reservas registradas</h1>
        </div>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Espaço</th>
                    <th>Usuário</th>
                    <th>Data de reserva</th>
                    <th>Horário de início</th>
                    <th>Horário de encerramento</th>
                    <th>Status</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($bookings as $booking): ?>
                    <tr>
                        <td><?= $booking['id'] ?></td>
                        <td><?= $booking['space_name'] ?></td>
                        <td><?= htmlspecialchars($booking['user_name']) ?></td>
                        <td><?= $booking['booking_date'] ?></td>
                        <td><?= $booking['start_time'] ?></td>
                        <td><?= $booking['end_time'] ?></td>
                        <td><?= $booking['status'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>

</html>