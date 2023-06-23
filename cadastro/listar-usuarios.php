<?php
    include_once('../auth/config.php');

    $sql = "SELECT * FROM usuarios";
    $res = $conn->query($sql);

    if ($res === false) {
        die("Erro na consulta: " .  mysqli_error($conn));
    }

    $qtd = $res->num_rows;

    if ($qtd > 0) {
        echo "<h1>LISTAR USUARIOS</h1>";
        echo "<table class='table table-rover table-striped table-bordered'>";
        echo "<tr>";
        echo "<th>#</th>";
        echo "<th>nome</th>";
        echo "<th>email</th>";
        echo "<th>Data de nascimento</th>";
        echo "<th>ações</th>";
        echo "</tr>";

        while ($row = $res->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["nome"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            echo "<td>" . $row["data_nascimento"] . "</td>";
            echo "<td>";
            echo "<button onclick=\"location.href='editar.php?id=" . $row["id"] . "';\" class='btn btn-success'>Editar</button>";
            echo "<button onclick=\"if(confirm('Tem certeza que deseja excluir?')){location.href='excluir.php?id=" . $row["id"] . "';} else{false}\" class='btn btn-danger'>Excluir</button>";
            echo "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "<p class='alert alert-danger'>Nenhum resultado encontrado!</p>";
    }
?>
