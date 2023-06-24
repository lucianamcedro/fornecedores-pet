<?php
    include_once('../auth/config.php');

    $id = $_GET["id"];

    $sql = "SELECT * FROM produtos WHERE id = $id";
    $res = $conn->query($sql);

    if ($res->num_rows == 1) {
        $row = $res->fetch_assoc();
        $nome = $row["nome"];
        $quantidade = $row["quantidade"];
        $valor = $row["valor"];
        $imagem = $row["imagem"];
        $descricao = $row["descricao"];
    } else {
        echo "Produto não encontrado.";
        exit();
    }
?>

<h1>EDITAR PRODUTO</h1>
<form action='editar-produto-action.php' method='POST'>
    <input type='hidden' name='id' value='<?php echo $id; ?>'>
    <div class='mb-3'>
        <label>Nome</label>
        <input type='text' name='nome' class='form-control' value='<?php echo $nome; ?>'>
    </div>
    <div class='mb-3'>
        <label>Quantidade</label>
        <input type='number' name='quantidade' class='form-control' value='<?php echo $quantidade; ?>'>
    </div>
    <div class='mb-3'>
        <label>Valor</label>
        <input type='text' name='valor' class='form-control' value='<?php echo $valor; ?>'>
    </div>
    <div class='mb-3'>
        <label>Imagem</label>
        <input type='text' name='imagem' class='form-control' value='<?php echo $imagem; ?>'>
    </div>
    <div class='mb-3'>
        <label>Descrição</label>
        <textarea name='descricao' class='form-control'><?php echo $descricao; ?></textarea>
    </div>
    <div class='mb-3'>
        <button type='submit' class='btn btn-primary'>Salvar</button>
    </div>
</form>
