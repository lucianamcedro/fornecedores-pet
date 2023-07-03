<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/listas.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-j6hZn7s/t4W0BOAR+MEQeDh/Rw8iizFT1Eiq25eo7DwXkWj4yqTW/gUiuo3vOlAr1OniB4FQUG+ACeU5jm5sdw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        session_start();

        include_once('../auth/config.php');

        $usuario_id = $_SESSION["usuario_id"];

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
        echo "<th>Ações</th>";
        echo "</tr>";

        if ($qtd > 0) {
            while ($row = $res->fetch_assoc()) {
                echo "<tr>";
                echo "<td class='name-cell'>";
                echo "<div class='name-content'>" . $row['nome'] . "</div>";
                echo "</td>";
                echo "<td>" . $row['quantidade'] . "</td>";
                echo "<td>" . $row['valor'] . "</td>";
                echo "<td>";


                if (!empty($row['imagem'])) {
                    echo "<img src='../img/image.png' alt='Imagem do produto' class='product-image' style='width: 30px; height: 30px;' onclick='openModal(\"" . $row['imagem'] . "\")'>";
                } else {
                    echo "<a href='editar-produto.php?id=" . $row['id'] . "'><img src='../img/add_image.png' alt='Adicionar Imagem' class='product-image' style='width: 30px; height: 30px;'></a>";

                }


                echo "</td>";
                echo "<td class='description-cell'>";
                echo "<div class='description-content' style='text-align: center;'>";
                echo $row['descricao'];
                echo "</div>";
                echo "</td>";
                echo "<td>";
                echo "<div class='button-group'>";
                echo "<button onclick=\"location.href='editar-produto.php?id=" . $row['id'] . "';\" class='btn btn-success'><i class='fas fa-edit btn-icon'></i>Editar</button>";
                echo "<button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='excluir-produto.php?id=" . $row['id'] . "';} else{false}\" class='btn btn-danger'><i class='fas fa-trash btn-icon'></i>Excluir</button>";
                echo "</div>";
                echo "</td>";

                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<td colspan='6'>Nenhum resultado encontrado!</td>";
            echo "</tr>";
        }
        echo "</table>";
        ?>


        <div class="container-cadastrar">
   
            <h1 style="font-weight: 400; text-align: left;">Novo Produto</h1>

            <form action="salvar-produto.php" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                <div style="display: inline-block; width: calc(45%);">
                    <label>Nome:</label>
                    <input type="text" name="nome" class="form-control" style="width: 100%;">
                </div>
                <div style="display: inline-block; width: calc(18%);">
                    <label>Quantidade:</label>
                    <input type="number" name="quantidade" class="form-control" style="width: 100%;">
                </div>
                <div style="display: inline-block; width: calc(18%);">
                    <label for="valor">Valor:</label>
                    <input type="text" name="valor" class="form-control" style="width: 100%;">
                </div>
                <div style="display: inline-block; width: calc(15%);">
                    <label for="image">Imagem:</label>
                    <input type="hidden" id="imagem-input" name="imagem" value="">

                    <span class="input-group-text" onclick="openImagePicker()" style="width: 100%;">
                        <img src="../img/add_image.png" alt="Adicionar Imagem" style="width: 42px; height: 42px;">
                    </span>
                </div>
                <div style="display: inline-block; width: calc(100%);">
                    <label for="email">Descrição:</label>
                    <textarea name="descricao" class="form-control" style="height: 10vh;"></textarea>
                </div>
                <div style="display: inline-block; width: calc(100%);">
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Criar produto</button>
                </div>
            </form>
        </div>
    </div>

    <div id="modal" class="modal">
    <div id="modal-content" class="modal-content">
        <span id="modal-close" class="modal-close">&times;</span>
        <img id="modal-image" src="" alt="Imagem ampliada" style="width: 50%; display: block; margin: 0 auto;">
    </div>
</div>

<script src="../script/produtos.js"></script>
</body>

</html>