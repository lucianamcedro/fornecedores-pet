<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastrar.css">
    <link rel="icon" type="image/png" href="/img/ico.jpg">
    <title>Cadastrar</title>
</head>
<body>
    <div class="container-inicio">
        <header>
            <h1>
                <a href="../index.php" class="logo">AuPet<span class="span">.</span></a>
            </h1>
            <div class="header-link">
                <li>
                    <a href="../index.php">Inicio</a>
                </li>
                <li> <a href="../contato.php" class="contato">Contato</a></li>
                <li><a href="../fornecedores.php" class="fornecedores">Fornecedores</a></li>
            </div>
        </header>
        <div class="container-cadastrar">
            <form action="salvar-usuario.php" method="POST">
                <div style="display: inline-block; width: calc(100%);">
                        <label for="nome">Nome:</label>
                        <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome"
                            style="width: 100%;">
                    </div>
                    <div style="display: inline-block; width: calc(100%);">
                        <label>Data de nascimento</label>
                        <input type="date" name="data_nascimento" class="form-control"  style="width: 100%;>
                    </div>
                    <div style="display: inline-block; width: calc(100%);">
                        <label for="email">Email:</label>
                        <input type="text" class="form-control" id="email" name="email" placeholder="Digite seu email"
                            style="width: 100%;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                    </div>
                    <div style="display: inline-block; width: calc(100%);">
                        <label for="telefone">Senha:</label>
                        <input type="password" name="senha" class="form-control" style="width:
                            100%;">
                    </div>

                    <div style="display: inline-block; width: calc(100%);">
                        <button type="submit" class="btn btn-primary" style="width:
                            100%;">Enviar</button>
                    </div>
                </form>

                
        </div>
        <script src="../script/contato-script.js"></script>

</body>

</html>