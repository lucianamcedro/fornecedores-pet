<?php
    session_start();

    if (empty($_POST) || empty($_POST["nome"]) || empty($_POST["senha"])) {
        header("Location: login.php");
        exit();
    }

    include('config.php');

    $nome = $_POST["nome"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios 
    WHERE nome = '{$nome}'
    AND senha = '{$senha}'";

    $res = $conn->query($sql) or die($conn->error);
    $row = $res->fetch_object();
    $qtd = $res->num_rows;

    if ($nome == "admin" && $senha == "admin") {
        $_SESSION["nome"] = $nome;
        header("Location: listar-usuarios.php");
        exit();
    } else {
        echo "<script>alert('Usuário e/ou senha incorreto(s)');</script>";
        echo "<script>location.href='login.php'</script>";
        exit();
    }
?>
