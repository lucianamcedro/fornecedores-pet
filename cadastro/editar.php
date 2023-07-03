<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastrar.css">
    <link rel="icon" type="image/png" href="../img/ico.jpg">
    <title>Editar Usúario</title>
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
        <?php
        include_once('../auth/config.php');

        if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
            $id = $_GET["id"];

            $sql = "SELECT * FROM usuarios WHERE id = $id";
            $res = $conn->query($sql);

            if ($res === false) {
                die("Erro na consulta: " . mysqli_error($conn));
            }

            if ($res->num_rows === 1) {
                $row = $res->fetch_object();
            } else {
                die("Usuário não encontrado!");
            }
        } elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["acao"]) && $_POST["acao"] === "editar") {
            $id = $_POST["id"];
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $dataNascimento = $_POST["data_nascimento"];

            $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha', data_nascimento = '$dataNascimento' WHERE id = $id";

            if ($conn->query($sql) === false) {
                die("Erro ao atualizar o usuário: " . mysqli_error($conn));
            }

            header("Location: listar-usuarios.php");
            exit();
        } else {
            die("Ação inválida!");
        }
        ?>


        <div class="container-cadastrar">
        <h1 style="font-weight: 400; text-align: left;">Editar Usuário</h1>

            <br>
            <form action="?page=salvar" method="POST">
                <input type="hidden" name="acao" value="editar">
                <input type="hidden" name="id" value="<?php echo $row->id; ?>">

                <label>Nome</label>
                <input type="text" name="nome" value="<?php echo $row->nome; ?>" class="form-control" style="width:
                            100%;">

                <div style="display: inline-block; width: calc(100%);">
                    <label>Data de nascimento</label>
                    <input type="date" name="data_nascimento" value="<?php echo $row->data_nascimento; ?>"
                        class="form-control" style="width: 100%;">
                </div>
                <div style="display: inline-block; width: calc(100%);">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" value="<?php echo $row->email; ?>" id="email" name="email"
                        placeholder="Digite seu email" style="width: 100%;"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
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

</body>

</html>