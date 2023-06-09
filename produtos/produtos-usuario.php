<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/listas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <link rel="icon" type="image/png" href="../img/ico.jpg">

    <title>Produtos do Usuário</title>
</head>

<body>
    <div class="container-inicio">
        <header>
        <a href="../index.php" class="logo"><img src='../img/logo.png'></a>
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
        session_start();
        include_once('../auth/config.php');

        $usuario_id = $_GET["usuario_id"];

        $sql = "SELECT p.* FROM produtos p INNER JOIN usuarios u ON p.usuario_id = u.id WHERE u.id = '$usuario_id'";
        $res = $conn->query($sql);

        if ($res === false) {
            die("Erro na consulta: " . mysqli_error($conn));
        }

        $qtd = $res->num_rows;

        echo "<table class='table'>";
        echo "<tr>";
        echo "<th>Nome</th>";
        echo "<th>Quantidade</th>";
        echo "<th>Valor</th>";
        echo "<th>Imagem</th>";
        echo "<th>Descrição</th>";
        echo "</tr>";

        if ($qtd > 0) {
            while ($row = $res->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['nome'] . "</td>";
                echo "<td>" . $row['quantidade'] . "</td>";
                echo "<td>" . $row['valor'] . "</td>";
                echo "<td>";
                if (!empty($row['imagem'])) {
                    echo "<img src='../img/image.png' alt='Imagem do produto' class='product-image' style='width: 30px; height: 30px;' onclick='openModal(\"" . $row['imagem'] . "\")'>";
                } else {
                    echo "<img src='../img/add_image.png' alt='Adicionar Imagem' class='product-image' style='width: 30px; height: 30px;'></a>";
                }
                echo "</td>";
                echo "<td>" . $row['descricao'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<td colspan='6'>Nenhum resultado encontrado!</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>
        <div id="modal" class="modal">
            <div id="modal-content" class="modal-content">
                <span id="modal-close" class="modal-close">&times;</span>
                <img id="modal-image" src="" alt="Imagem ampliada" style="width: 50%; display: block; margin: 0 auto;">
            </div>
        </div>
    </div>
    <script src="../script/produtos.js"></script>
</body>

</html>