<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <link rel="icon" type="image/png" href="../img/ico.jpg">
    <title>Login</title>
</head>

<body>
    <div class="container-inicio">
        <header>
                <a href="../index.php" class="logo"><img src='../img/logo.png'></a>
            <div class="header-link">
                <li>
                    <a href="../index.php">Inicio</a>
                </li>
                <li> <a href="../contato.php" class="contato">Contato</a></li>
                <li><a href="../fornecedores.php" class="fornecedores">Fornecedores</a></li>
            </div>
        </header>
        <div class="container-login">
            <div class="container-infos">
                <h1 class="title-contact">Login</h1>
                <p class="contact-info">Bem vindo de volta!</p>
            </div>

            <form method="POST" action="processar-login.php">
                <div style="display: inline-block; width: calc(100%);">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Digite seu email"
                        style="width: 100%;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                </div>
                <div style="display: inline-block; width: calc(100%);">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" class="form-control" name="senha" style="width:
                            100%;">
                </div>

                <div style="display: inline-block; width: calc(100%);">
                    <button type="submit" class="btn btn-primary" style="width:
                            100%;">Continuar</button>
                </div>
            </form>

            <div class="end-cadastro">
                <br>
                <p class="contact-info">Não tem acesso? <a
                        href="../cadastro/novo-usuario.php"><strong>Cadastra-se</strong></a></p>


            </div>

            <a href="recuperar-senha.php">Esqueceu sua senha?</a>

        </div>
</body>

</html>