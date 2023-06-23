<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel=stylesheet>

    <style>
        .login{

            width:100%;
            height: 100vh;
            align-items: center;
            justify-content: center;
            display: flex;
        }
    </style>

    <title>Acesso Restrito</title>
</head>

<body style="background-color: #563F91FF">
<div class="login">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 offset-lg-4">
                <div class="card" style="background-color: #f2b22e">
                    <div class="card-body">
                        <h3>Acesso Restrito</h3>
                    </div>
                        <div class="card-body">
                            <form action="login.php" method="POST">
                            <div>
                                <div class="mb-3">
                                    <label>Nome</label>
                                    <input type="text" name="nome" class="form-control">
                                </div>
                            </div>
                            <div>
                                <div class="mb-3">
                                <label>Senha</label>
                                    <input type="password" name="senha" class="form-control">
                                    <button type="submit" class="btn btn-primary">Enviar</button>
                                </div>
                            </div>
                            <div>
                                <div class="mb-3">

                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</body>
</html>