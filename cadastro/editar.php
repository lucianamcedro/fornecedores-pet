<?php
    include_once('../auth/config.php');

    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];

        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $res = $conn->query($sql);

        if ($res === false) {
            die("Erro na consulta: " . $conn->error);
        }

        if ($res->num_rows === 1) {
            $row = $res->fetch_object();
        } else {
            die("Usuário não encontrado!");
        }
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["acao"]) && $_POST["acao"] === "editar") {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $email = $_POST["email"];
        $senha = $_POST["senha"];
        $dataNascimento = $_POST["data_nascimento"];

        $sql = "UPDATE usuarios SET nome = '$nome', email = '$email', senha = '$senha', data_nascimento = '$dataNascimento' WHERE id = $id";

        if ($conn->query($sql) === false) {
            die("Erro ao atualizar o usuário: " . $conn->error);
        }

        header("Location: listar-usuarios.php");
        exit();
    } else {
        die("Ação inválida!");
    }
?>

<h1>Editar usuário</h1>

<form action="?page=salvar" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php echo $row->id; ?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo $row->nome; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" value="<?php echo $row->email; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Senha</label>
        <input type="password" name="senha" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Data de nascimento</label>
        <input type="date" name="data_nascimento" value="<?php echo $row->data_nascimento; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>
