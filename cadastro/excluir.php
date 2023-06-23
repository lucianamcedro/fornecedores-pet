<?php
    include_once('../auth/config.php');

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $deleteSql = "DELETE FROM usuarios WHERE id=$id";

        if ($conn->query($deleteSql) === TRUE) {
            header("Location: listar-usuarios.php");
            exit();
        } else {
            echo "Erro ao excluir o usuário: " . $conn->error;
        }
    }
?>
