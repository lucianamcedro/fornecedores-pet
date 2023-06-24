

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="../css/header.css">
    <link rel="icon" type="image/png" href="./img/ico.jpg">
    <title>Login</title>
</head>

<body>
    <div class="container-meio">
        <div class="container-inicio">
            <header>
                <h1>
                    <a href="../index.php" class="logo">AuPet<span class="span">.</span></a>
                </h1>
                <div class="header-link">
                    <li>
                        <a href="../index.php">Inicio</a>
                    </li>
                    <li>
                        <a href="../contato.php" class="contato">Contato</a>
                    </li>
                    <li>
                        <a href="../fornecedores.php" class="fornecedores">Fornecedores</a>
                    </li>
                    <li>
                        <a href="#login" class="login">Login</a>
                    </li>
                </div>
            </header>

            <h2>Tela de Login</h2>
    <form method="POST" action="processar-login.php">
        <label for="nome">Nome de usuário:</label>
        <input type="text" id="nome" name="nome" required><br><br>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required><br><br>

        <input type="submit" value="Entrar">
    </form>
        </div> 
    </div>
</body>
</html>
