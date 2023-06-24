<?php
    include_once('../auth/config.php');

    if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE FROM produtos WHERE id = $id";

        if ($conn->query($sql) === true) {
            echo "<script>alert('Produto excluído com sucesso!');</script>";
            echo "<script>location.href='lista-produtos.php'</script>";
            exit();
        } else {
            echo "Erro ao excluir produto: " . $conn->error;
        }
    }
?>
