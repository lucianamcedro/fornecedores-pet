<?php
include('../auth/config.php');
require('../auth/password.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $data_nascimento = $_POST["data_nascimento"];

    if (empty($nome) || empty($email) || empty($senha) || empty($data_nascimento)) {
        echo "<script>alert('Por favor, preencha todos os campos!');</script>";
        echo "<script>location.href='../cadastro/novo-usuario.php';</script>";
        exit();
    }

    if (strlen($senha) < 4) {
        echo "<script>alert('A senha deve ter no mínimo 4 caracteres!');</script>";
        echo "<script>location.href='../cadastro/novo-usuario.php';</script>";
        exit();
    }

    $sql_check_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $result_check_email = $conn->query($sql_check_email);

    if ($result_check_email->num_rows > 0) {
        header("Location: ../cadastro/novo-usuario.php?error=email&nome=" . urlencode($nome) . "&data_nascimento=" . urlencode($data_nascimento));
        exit();
    }

    $role = 'user';

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha, data_nascimento, role)
    VALUES ('$nome', '$email', '$senhaHash', '$data_nascimento', '$role')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cadastrado com sucesso!');</script>";
        echo "<script>location.href='../index.php';</script>";
    } else {
        echo "<script>alert('Não foi possível cadastrar!');</script>";
        echo "<script>location.href='../cadastro/novo-usuario.php';</script>";
    }
}

$conn->close();
?>
