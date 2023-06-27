<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/lista_usuarios.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="icon" type="image/png" href="../img/ico.jpg">

    <title>Usuários</title>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
</head>

<body>
    <div class="container-inicio">
        <header>
            <h1>
                <a href="../index.php" class="logo">AuPet<span class="span">.</span></a>
            </h1>
            <nav>
                <ul class="header-link">
                    <li><a href="../index.php">Início</a></li>
                    <li><a href="../contato.php">Contato</a></li>
                    <li><a href="../fornecedores.php">Fornecedores</a></li>
                    <li><a href="../auth/logout.php">Sair</a></li>
                </ul>
            </nav>
        </header>

        <div class="container-usuarios">
            <?php
            include_once('../auth/config.php');

            $sql = "SELECT * FROM usuarios";
            $res = $conn->query($sql);

            if ($res === false) {
                die("Erro na consulta: " .  mysqli_error($conn));
            }

            $qtd = $res->num_rows;

            if ($qtd > 0) {
                echo "<h1>Usúarios Cadastrados</h1>";
                echo "<table class='table table-rover table-striped table-bordered'>";
                echo "<tr>";
                echo "<th>ID</th>";
                echo "<th>Nome</th>";
                echo "<th>Email</th>";
                echo "<th>Data de Nascimento</th>";
                echo "<th>Ações</th>";
                echo "</tr>";

                while ($row = $res->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nome"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["data_nascimento"] . "</td>";
                    echo "<td class='buttons'>";
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
        </div>

    </div>

</body>
</html>
