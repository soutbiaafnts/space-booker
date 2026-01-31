<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <header>
        <h1>Login</h1>
    </header>
    <main>
        <form action="login_process.php" method="post">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            <label for="password">Senha:</label>
            <input type="password" id="password" name="password" required><br>
            <input type="submit" value="Entrar">
        </form>
        <a href="">Não tem conta? Cadastre-se</a>
        <?php if(isset($_GET['error'])) { ?>
                <p>Email ou senha incorretos.</p>
        <?php } ?>
    </main>
</body>
</html>