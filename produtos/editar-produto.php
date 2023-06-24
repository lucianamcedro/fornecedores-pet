<?php
    include_once('../auth/config.php');

    if ($_SERVER["REQUEST_METHOD"] === "GET" && isset($_GET["id"])) {
        $id = $_GET["id"];

        $stmt = $conn->prepare("SELECT * FROM produtos WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $res = $stmt->get_result();

        if ($res === false) {
            die("Erro na consulta: " . $stmt->error);
        }

        if ($res->num_rows === 1) {
            $row = $res->fetch_assoc();
        } else {
            die("Produto não encontrado!");
        }

        $stmt->close();
    } elseif ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["acao"]) && $_POST["acao"] === "editar") {
        $id = $_POST["id"];
        $nome = $_POST["nome"];
        $quantidade = $_POST["quantidade"];
        $valor = $_POST["valor"];
        $imagem = $_POST["imagem"];
        $descricao = $_POST["descricao"];

        $stmt = $conn->prepare("UPDATE produtos SET nome = ?, quantidade = ?, valor = ?, imagem = ?, descricao = ? WHERE id = ?");
        $stmt->bind_param("sidsii", $nome, $quantidade, $valor, $imagem, $descricao, $id);
        $stmt->execute();

        if ($stmt->affected_rows === 1) {
            header("Location: lista-produtos.php");
            exit();
        } else {
            die("Erro ao atualizar o produto: " . $stmt->error);
        }

        $stmt->close();
    } else {
        die("Ação inválida!");
    }
?>

<h1>Editar Produto</h1>

<form action="" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id" value="<?php echo isset($row['id']) ? $row['id'] : ''; ?>">
    <div class="mb-3">
        <label>Nome</label>
        <input type="text" name="nome" value="<?php echo isset($row['nome']) ? $row['nome'] : ''; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Quantidade</label>
        <input type="number" name="quantidade" value="<?php echo isset($row['quantidade']) ? $row['quantidade'] : ''; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Valor</label>
        <input type="text" name="valor" value="<?php echo isset($row['valor']) ? $row['valor'] : ''; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Imagem</label>
        <input type="text" name="imagem" value="<?php echo isset($row['imagem']) ? $row['imagem'] : ''; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Descrição</label>
        <textarea name="descricao" class="form-control"><?php echo isset($row['descricao']) ? $row['descricao'] : ''; ?></textarea>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary">Salvar</button>
    </div>
</form>
