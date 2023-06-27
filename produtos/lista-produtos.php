

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" href="../css/header.css">
    <link rel="icon" type="image/png" href="./img/ico.jpg">
    <title>Meus Produtos</title>
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

            <?php
    include_once('../auth/config.php');

    $sql = "SELECT * FROM produtos";
    $res = $conn->query($sql);

    if ($res === false) {
        die("Erro na consulta: " . mysqli_error($conn));
    }

    $qtd = $res->num_rows;

    echo "<h1>LISTAR PRODUTOS</h1>";
    echo "<table class='table table-rover table-striped table-bordered'>";
    echo "<tr>";
    echo "<th>#</th>";
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
            echo "<td>" . $row['id'] . "</td>";
            echo "<td>" . $row['nome'] . "</td>";
            echo "<td>" . $row['quantidade'] . "</td>";
            echo "<td>" . $row['valor'] . "</td>";
            echo "<td>" . $row['imagem'] . "</td>";
            echo "<td>" . $row['descricao'] . "</td>";
            echo "<td>";
            echo "<button onclick=\"location.href='editar-produto.php?id=" . $row['id'] . "';\" class='btn btn-success'>Editar</button>";
            echo "<button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='excluir-produto.php?id=" . $row['id'] . "';} else{false}\" class='btn btn-danger'>Excluir</button>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr>";
        echo "<td colspan='7'>Nenhum resultado encontrado!</td>";
        echo "</tr>";
    }

    

    echo "</table>";

    

    
?>



            <h1>CRIAR PRODUTO</h1>
<form action="salvar-produto.php" method="POST">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" class="form-control">
    </div>
    <div class="mb-3">
        <label>Quantidade</label>
        <input type="number" name="quantidade" class="form-control">
    </div>
    <div class="mb-3">
        <label>Valor</label>
        <input type="text" name="valor" class="form-control">
    </div>
    <div class="mb-3">
        <label>Imagem</label>
        <input type="text" name="imagem" class="form-control">
    </div>
    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control"></textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>

        </div> 
    </div>
</body>
</html>

