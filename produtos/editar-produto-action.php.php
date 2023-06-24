<?php
    include_once('../auth/config.php');

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $quantidade = $_POST["quantidade"];
        $valor = $_POST["valor"];
        $imagem = $_POST["imagem"];
        $descricao = $_POST["descricao"];

        $sql = "UPDATE produtos SET
                nome = '$nome',
                quantidade = $quantidade,
                valor = $valor,
                imagem = '$imagem',
                descricao = '$descricao'
                WHERE id = $id";

        if ($conn->query($sql) === true) {
            header("Location: lista-produtos.php");
            exit();
        } else {
            echo "Erro ao atualizar produto: " . $conn->error;
            echo "Query: " . $sql;
        }
    } else {
        echo "Método inválido.";
    }
?>
