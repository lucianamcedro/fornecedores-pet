<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="../css/header.css">
    <link rel="icon" type="image/png" href="./img/ico.jpg">
    <title>Cadastrar</title>
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

            <form action="salvar-usuario.php" method="POST">
                <div class="mb-3">
                    <label>Nome</label>
                    <input type="text" name="nome" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Senha</label>
                    <input type="password" name="senha" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Data de nascimento</label>
                    <input type="date" name="data_nascimento" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div> 
    </div>
</body>
</html>
