<?php
session_start();

if (empty($_POST) || empty($_POST["email"]) || empty($_POST["senha"])) {
    header("Location: login.php");
    exit();
}

include('../auth/config.php');

$email = $_POST["email"];
$senha = $_POST["senha"];

$sql = "SELECT * FROM usuarios 
WHERE email = '{$email}'
AND senha = '{$senha}'";

$res = $conn->query($sql);

if (!$res) {
    die("Erro na consulta: " . mysqli_error($conn));
}

$qtd = $res->num_rows;

if ($qtd > 0) {
    $row = $res->fetch_assoc();
    $_SESSION["usuario_id"] = $row["id"];
    $_SESSION["usuario"] = $row["email"]; 
    $_SESSION["role"] = $row["role"]; 

    if ($_SESSION["role"] == 'admin') { 
        header("Location: ../cadastro/listar-usuarios.php");
        exit();
    } else {
        header("Location: ../produtos/lista-produtos.php");
        exit();
    }
} else {
    echo "<script>alert('Usuário e/ou senha incorreto(s)');</script>";
    echo "<script>window.location.href='login.php';</script>";
    exit();
}
?>
