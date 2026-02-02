<?php
require_once '../../includes/auth.php';
require_once '../../config/database.php';

$pdo = connect();

$stmt = $pdo->prepare("
    SELECT
        bookings.id,
        spaces.name AS space_name,
        bookings.booking_date,
        bookings.start_time,
        bookings.end_time,
        bookings.status
    FROM bookings
    JOIN spaces 
        ON spaces.id = bookings.space_id
    WHERE bookings.user_id = ?
    ORDER BY bookings.booking_date, bookings.start_time
");

$stmt->execute([$_SESSION['user_id']]);
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
    <?php if (empty($bookings)): ?>
        <main>
            <div class="center-info">
                <h1>Ops...</h1>
                <p>Você ainda não possui reservas</p>
            </div>
        </main>
    <?php else: ?>
        <main class="container">
            <div class="head">
                <h1>Minhas reservas</h1>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Espaço</th>
                        <th>Data de reserva</th>
                        <th>Horário de início</th>
                        <th>Horário de encerramento</th>
                        <th>Status</th>
                        <th class="actions">Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($bookings as $booking): ?>
                        <tr>
                            <td><?= $booking['id'] ?></td>
                            <td><?= $booking['space_name'] ?></td>
                            <td><?= $booking['booking_date'] ?></td>
                            <td><?= $booking['start_time'] ?></td>
                            <td><?= $booking['end_time'] ?></td>
                            <td><?= $booking['status'] ?></td>
                            <td class="actions">
                                <?php if ($booking['status'] === 'active'): ?>
                                    <a href="cancel.php?id=<?= $booking['id'] ?>"
                                        onclick="return confirm('Tem certeza que deseja cancelar esta reserva?')">
                                        <span class="delete">Cancelar</span>
                                    </a>
                                <?php else: ?>
                                    -
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php endif; ?>
        </main>
</body>

</html>