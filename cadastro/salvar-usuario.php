<?php
include('../auth/config.php');

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

    $sql_check_email = "SELECT * FROM usuarios WHERE email = '$email'";
    $result_check_email = $conn->query($sql_check_email);

    if ($result_check_email->num_rows > 0) {
        echo "<script>alert('O email informado já está cadastrado!');</script>";
        echo "<script>location.href='../cadastro/novo-usuario.php';</script>";
        exit();
    }

    $sql = "INSERT INTO usuarios (nome, email, senha, data_nascimento)
    VALUES ('$nome', '$email', '$senha', '$data_nascimento')";

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
