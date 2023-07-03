<?php
include_once('../auth/config.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $produtosSql = "SELECT id FROM produtos WHERE usuario_id=$id";
    $produtosResult = $conn->query($produtosSql);

    while ($produto = $produtosResult->fetch_assoc()) {
        $produtoId = $produto['id'];
        $deleteProdutoSql = "DELETE FROM produtos WHERE id=$produtoId";
        $conn->query($deleteProdutoSql);
    }

    $deleteSql = "DELETE FROM usuarios WHERE id=$id";

    if ($conn->query($deleteSql) === TRUE) {
        header("Location: listar-usuarios.php");
        exit();
    } else {
        echo "Erro ao excluir o usuário: " . mysqli_error($conn);
    }
}
?>