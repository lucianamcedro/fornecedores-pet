<?php
session_start();
include_once('../auth/config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $quantidade = $_POST["quantidade"];
    $valor = $_POST["valor"];
    $imagem = $_POST["imagem"];
    $descricao = $_POST["descricao"];

    // Verificar se o usuário está logado
    if (!isset($_SESSION["usuario"])) {
        echo "Erro: Usuário não encontrado.";
        exit();
    }

    $email = $_SESSION["usuario"];

    // Obter o ID do usuário com base no email
    $sql_get_usuario_id = "SELECT id FROM usuarios WHERE email = '$email'";
    $result = $conn->query($sql_get_usuario_id);

    if ($result === false) {
        echo "Erro ao obter o ID do usuário: " . mysqli_error($conn);
        exit();
    }

    $row = $result->fetch_assoc();
    $usuario_id = $row["id"];

    // Preparar a consulta SQL usando prepared statements para evitar ataques de SQL injection
    $sql_insert_produto = "INSERT INTO produtos (nome, quantidade, valor, imagem, descricao, usuario_id)
        VALUES (?, ?, ?, ?, ?, ?)";

    // Preparar a declaração SQL e vincular os parâmetros
    $stmt = $conn->prepare($sql_insert_produto);
    $stmt->bind_param("sisssi", $nome, $quantidade, $valor, $imagem, $descricao, $usuario_id);

    if ($stmt->execute()) {
        echo "<script>alert('Produto criado com sucesso!');</script>";
        echo "<script>location.href='lista-produtos.php'</script>";
        exit();
    } else {
        echo "Erro ao criar produto: " . $stmt->error;
    }

    // Fechar a declaração e a conexão com o banco de dados
    $stmt->close();
    $conn->close();
}
?>
