<?php
    session_start();

    if (empty($_POST) || empty($_POST["email"]) || empty($_POST["senha"])) {
        header("Location: login.php");
        exit();
    }

    include('./config.php');

    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios 
    WHERE email = '{$email}'
    AND senha = '{$senha}'";

    $res = $conn->query($sql) or die($conn->error);
    $row = $res->fetch_object();
    $qtd = $res->num_rows;

    if ($email == "admin" && $senha == "admin") {
        $_SESSION["email"] = $email;
        header("Location: listar-usuarios.php");
        exit();
    } else {
        echo "<script>alert('Usuário e/ou senha incorreto(s)');</script>";
        echo "<script>location.href='login.php'</script>";
        exit();
    }
?>
