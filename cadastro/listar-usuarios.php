

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/listas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="icon" type="image/png" href="../img/ico.jpg">

    <title>Meus Produtos</title>
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
                <li>
                    <a href="../contato.php" class="contato">Contato</a>
                </li>
                <li>
                    <a href="../fornecedores.php" class="fornecedores">Fornecedores</a>
                </li>
                <li><a href="../auth/logout.php">Sair</a></li>
            </div>
        </header>

        <?php
            include_once('../auth/config.php');

            $sql = "SELECT * FROM usuarios";
            $res = $conn->query($sql);

            if ($res === false) {
                die("Erro na consulta: " .  mysqli_error($conn));
            }

            $qtd = $res->num_rows;

            if ($qtd > 0) {
                echo "<h1>Usuários Cadastrados</h1>";
                echo "<table class='table'>";
                echo "<tr>";
                echo "<th>Nome</th>";
                echo "<th>Email</th>";
                echo "<th>Data de Nascimento</th>";
                echo "<th>Ações</th>";
                echo "</tr>";

                while ($row = $res->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["data_nascimento"] . "</td>";
                    echo "<td>";
                    echo "<div class='button-group'>";
                    echo "<button onclick=\"location.href='editar.php?id=" . $row["id"] . "';\" class='btn btn-success custom-button'><i class='fas fa-pencil-alt btn-icon'></i>Editar</button>";
                    echo "<button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='excluir.php?id=" . $row["id"] . "';} else{false}\" class='btn btn-danger custom-button'><i class='fas fa-trash-alt btn-icon'></i>Excluir</button>";
                    echo "</td>";
                    echo "</tr>";
                }

                echo "</table>";
            } else {
                echo "<p class='alert alert-danger'>Nenhum resultado encontrado!</p>";
            }
            ?>

      

        <script src="../script/contato-script.js"></script>
    </div>
</body>

</html>
