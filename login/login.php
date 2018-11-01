<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>

    <title>EG</title>

    <meta charset="utf-8">

    <link rel="stylesheet" type="text/css" href="semantic/semantic.css">


</head>
<body>
<script type="text/javascript" src="semantic/semantic.min.js"></script>
<div class="ui middle aligned center aligned grid">
    <div class="column">
        <h2 class="ui inverted image header">
            <div class="content">
                <img src="../imagenseg/Easy Gaming.png">
            </div>
        </h2>

        <form name="loginform" method="post" class="ui large form">

            <div class="ui stacked segment">
                <div class="field">
                    <div class="ui left icon input">
                        <i class="mail icon"></i>
                        <input type="email" name="email" id="email" placeholder="Email" required="">
                    </div>
                </div>
                <div class="field">
                    <div class="ui left icon input">
                        <i class="lock icon"></i>
                        <input type="password" name="senha" id="senha" placeholder="Senha" required="">
                    </div>
                </div>
                <div>
                    <button type="submit"  value="entrar" name="entrar" id="entrar" class="ui inverted fluid large submit button" style="background-color: #191919">Entrar</button>
                </div>
            </div>

            <div class="ui error message">

                

            </div>

        </form>
                <div class="ui message">
                    <div class="field">
                        <div class="ui right icon input">
                            <a href="index.php">Cadastre-se</a>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>


<?php 

    require_once "crud_usuario.php";

    if (isset($_POST['entrar'])) { 
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $crud = new crud_usuario;
            $usuario = $crud->login($email, $senha);
            if ($usuario) { //se deu certo o login
                $_SESSION['cod_usuario'] = $usuario['cod_usuario'];
                $_SESSION['nome_usuario'] = $usuario['nome_usuario'];
                $_SESSION['email_usuario'] = $usuario['email_usuario'];
                $_SESSION['tipo_usuario'] = $usuario['tipo_usuario'];

                header('location: logado.php?');
            } else {

                echo "dados incorretos";
            }
        }
    

 ?>


<style type="text/css">
    body {
        background-color: #191919;
    }
    body > .grid {
        height: 100%;
    }
    .image {
        margin-top: -100px;
    }
    .column {
        max-width: 450px;
    }
</style>


</body>
</html>