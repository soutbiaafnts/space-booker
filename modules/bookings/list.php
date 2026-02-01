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
    <title>Lista de Reservas</title>
</head>
<body>
    <header>
        <h1>Minhas Reservas</h1>
    </header>
    <main>
        <?php if(empty($bookings)): ?>
            <p>Você ainda não possui reservar</p>
        <?php else: ?>
            <table>
                <tr>
                    <th>Espaço</th>
                    <th>Data de reserva</th>
                    <th>Horário de início</th>
                    <th>Horário de encerramento</th>
                    <th>Status</th>
                    <th>Ações</th>
                </tr>

                <?php foreach ($bookings as $booking): ?>
                    <tr>
                        <td><?= $booking['space_name'] ?></td>
                        <td><?= $booking['booking_date'] ?></td>
                        <td><?= $booking['start_time'] ?></td>
                        <td><?= $booking['end_time'] ?></td>
                        <td><?= $booking['status'] ?></td>
                        <td>
                            <?php if ($booking['status'] === 'active'): ?>
                                <a href="cancel.php?id=<?= $booking['id'] ?>" 
                                onclick="return confirm('Tem certeza que deseja cancelar esta reserva?')">
                                    Cancelar
                                </a>
                            <?php else: ?>
                                -
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php endif; ?>
    </main>
</body>
</html>