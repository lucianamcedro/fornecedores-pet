<?php
    session_start();

    if (empty($_POST) || empty($_POST["nome"]) || empty($_POST["senha"])) {
        header("Location: login.php");
        exit();
    }

    include('../auth/config.php');

    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios 
    WHERE nome = '{$nome}'
    AND senha = '{$senha}'";

    $res = $conn->query($sql);

    if (!$res) {
        die("Erro na consulta: " . mysqli_error($conn));
    }

    $qtd = $res->num_rows;

    if ($qtd > 0) {
        $_SESSION["nome"] = $nome;
        header("Location: ../cadastro/listar-usuarios.php");
        exit();
    } else {
        echo "<script>alert('Usuário e/ou senha incorreto(s)');</script>";
        echo "<script>location.href='login.php'</script>";
        exit();
    }
?>
