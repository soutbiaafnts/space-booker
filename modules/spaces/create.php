<?php
    require_once '../../includes/auth.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Espaço</title>
</head>
<body>
    <header>
        <h1>Crie um novo Espaço</h1>
    </header>
    <main>
        <form action="store.php" method="post">
            <label for="name">Nome do espaço</label>
            <input type="text" name="name" id="name" required><br><br>
            
            
            <label for="description">Descrição</label>
            <textarea name="description" id="description"></textarea><br><br>

            <label for="location">Local</label>
            <input type="text"  name="location" id="location"><br><br>

            <label for="capacity">Capacidade</label>
            <input type="number" name="capacity" id="capacity"><br><br>

            <button type="submit">Salvar</button>
        </form>
    </main>
    <footer>
        DEW I - Trabalho Final - Bianca Fontes
    </footer>
</body>
</html>