<?php
include('config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $data_nascimento = $_POST["data_nascimento"];

    $sql = "INSERT INTO usuarios (nome, email, senha, data_nascimento)
    VALUES ('$nome', '$email', '$senha', '$data_nascimento')";


    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Cadastrado com sucesso!');</script>";
        echo "<script>location.href='index.php';</script>";
    } else {
        echo "<script>alert('Não foi possível cadastrar!');</script>";
        echo "<script>location.href='index.php';</script>";
    }
}

$conn->close();
?>
