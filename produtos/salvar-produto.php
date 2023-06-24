<?php
    include_once('../auth/config.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nome = $_POST["nome"];
        $quantidade = $_POST["quantidade"];
        $valor = $_POST["valor"];
        $imagem = $_POST["imagem"];
        $descricao = $_POST["descricao"];

        $sql = "INSERT INTO produtos (nome, quantidade, valor, imagem, descricao)
                VALUES ('$nome', $quantidade, $valor, '$imagem', '$descricao')";

        if ($conn->query($sql) === true) {
            echo "<script>alert('Produto criado com sucesso!');</script>";
            echo "<script>location.href='lista-produtos.php'</script>";
            exit();
        } else {
            echo "Erro ao criar produto: " . $conn->error;
        }
    }
?>
