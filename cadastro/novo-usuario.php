<?php
$nome = isset($_GET['nome']) ? $_GET['nome'] : '';
$data_nascimento = isset($_GET['data_nascimento']) ? $_GET['data_nascimento'] : '';
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cadastrar.css">
    <link rel="icon" type="image/png" href="../img/ico.jpg">
    <title>Cadastrar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>
    <div class="container-inicio">
        <header>
                <a href="../index.php" class="logo"><img src='../img/logo.png'></a>
            <div class="header-link">
                <li>
                    <a href="../index.php">Inicio</a>
                </li>
                <li> <a href="../contato.php" class="contato">Contato</a></li>
                <li><a href="../fornecedores.php" class="fornecedores">Fornecedores</a></li>
            </div>
        </header>
        <div class="container-cadastrar">

            <div class="container-infos">
                <h1 class="title-contact">Criar seu cadastro</h1>
                <p class="contact-info">Para criar uma conta, por favor, preencha todos os campos abaixo.</p>

            </div>

            <form action="salvar-usuario.php" method="POST">
                <div style="display: inline-block; width: calc(100%);">
                    <label for="nome">Nome:</label>
                    <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome"
                        value="<?php echo $nome; ?>" style="width: 100%;" required>
                </div>
                <div style="display: inline-block; width: calc(100%);">
                    <label>Data de nascimento</label>
                    <input type="date" name="data_nascimento" class="form-control" style="width: 100%;"
                        value="<?php echo $data_nascimento; ?>" required>
                </div>
                <div style="display: inline-block; width: calc(100%);">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Digite seu email"
                        style="width: 100%;" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                </div>
                <div style="display: inline-block; width: calc(100%);">
                    <label for="senha">Senha:</label>
                    <input type="password" name="senha" class="form-control" style="width:
                            100%;">
                </div>
                <div style="display: inline-block; width: calc(100%);">
                    <button type="submit" class="btn btn-primary" style="width:
                            100%;">Criar cadastro</button>
                </div>
            </form>
            <div class="modal" id="emailModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Email já cadastrado</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <p>O email informado já está cadastrado!</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            <?php if (isset($_GET['error']) && $_GET['error'] === 'email') { ?>
                var emailModal = document.getElementById('emailModal');
                emailModal.style.display = 'block';
                var closeBtns = emailModal.querySelectorAll('.close, .btn-secondary');
                closeBtns.forEach(function (btn) {
                    btn.addEventListener('click', function () {
                        emailModal.style.display = 'none';
                    });
                });
            <?php } ?>
        });
    </script>
</body>

</html>