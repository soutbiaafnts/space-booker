<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Usuário</title>
</head>
<script src="../../assets/js/users/create.js"></script>
<body>
    <header>
        <h1>Novo Usuário</h1>
    </header>
    <main>
        <form action="store.php" method="post">
            <label for="name">Nome</label>
            <input type="text" name="name" id="name" required><br><br>

            <label for="email">E-mail</label>
            <input type="email" name="email" id="email" required><br><br>

            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required><br><br>
            
            <label for="password_rep">Repita a senha</label>
            <input type="password" name="password_rep" id="password_rep" required><br><br>

            <button type="submit">Salvar</button>
        </form>

        <a href="list.php">Voltar</a>
    </main>
</body>

</html>