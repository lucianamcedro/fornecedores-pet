<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/contato.css">
    <link rel="stylesheet" href="./css/header.css">
    <link rel="icon" type="image/png" href="./img/ico.jpg">


    <title>Contato</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>
</head>

<body>
    <div class="container-inicio">
        <header>
            <h1>
                <a href="./index.php" class="logo">AuPet<span class="span">.</span></a>
            </h1>
            <div class="header-link">
                <li>
                    <a href="./index.php">Inicio</a>
                </li>
                <li> <a href="./contato.php" class="contato">Contato</a></li>
                <li><a href="./fornecedores.php" class="fornecedores">Fornecedores</a></li>
                <li><a href="./auth/login.php" class="login">Login</a></li>
            </div>
        </header>
        <div id="success-modal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <p>Seu e-mail foi enviado com sucesso!</p>
            </div>
        </div>

        <div class="container-contact">

            <div class="container-infos">
                <h1 class="title-contact">Contato</h1>
                <p class="contact-info">Você tem alguma sugestão ou reclamação? Entre em contato conosco.</p>
                <p class="form-instructions">Por favor, preencha o formulário abaixo.</p>
            
            
            </div>


            <form action="https://api.staticforms.xyz/submit" method="POST" id="contact-form">
                <input type="hidden" name="accessKey" value="a6a45852-f3f1-4088-a562-a3a986c48610">
                <div style="display: inline-block; width: calc(50% - 5px);">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="name" placeholder="Digite seu nome" style="width: 100%;">
                </div>
                <div style="display: inline-block; width: calc(50% - 5px);">
                    <label for="telefone">Telefone:</label>
                    <input type="text" id="telefone" name="phone" placeholder="99 99999 9999" style="width:
                            100%;">
                </div>
                <div style="display: inline-block; width: calc(100%);">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email" placeholder="Digite seu email" style="width: 100%;"
                        pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                </div>
                <div style="display: inline-block; width: calc(100%);">
                    <label for="email">Messagem:</label>
                    <textarea name="message" style="height: 100px;"></textarea>
                </div>

                <div style="display: inline-block; width: calc(100%);">
                    <button type="submit" id="enviar-btn" style="width:
                            100%;">Enviar</button>
                </div>
            </form>
        </div>
        <script src="./script/contato-script.js"></script>

</body>

</html>