<?php
include('funcoes.php');
?>
<!DOCTYPE html>
<html>
<head>
    <title> Course Factory SYS - Admin </title>

    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/semantic.css">
    <link rel="stylesheet" type="text/css" href="css/homepage.css">

    <script src="js/bibliotecas.js"></script>
    <script src="js/semantic.js"></script>
    <script src="js/homepage.js"></script>

</head>


<body id="home">
<div class="ui navbar inverted">
    <br>
    <img class="ui small centered  image" src="img/logotipo.png"  >
</div>


<br><br>
<div class="ui inverted masthead titlePage">
    <div class="ui hidden transition information">
        <h1 class="ui header center admin aligned ">
            <div class="grid-50">
                Course Factory SYS
            </div>
        </h1>


    </div>
</div>


<br><br>
<div style="text-align: -webkit-center;">
    <form id="logar" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" class="ui form" style="max-width: 500px">
        <div class="ui fluid form segment">
            <div class="one field">
                <div class="field">
                    <label style="font-size: 1pc;">Usuário</label>
                    <div class="ui big icon input">
                        <input name="usuario" type="text" autocomplete="off" placeholder="Usuário">
                        <i class="user icon"></i>
                    </div>
                </div>
            </div>
            <div class="one field">
                <div class="field">
                    <label style="font-size: 1pc;">Senha</label>
                    <div class="ui big icon input">
                        <input name="senha" type="password" placeholder="Senha">
                        <i class="lock icon"></i>
                    </div>
                </div>
            </div>
            <a id="botao"   class="ui big red button animated fade" href="#" >
                <div class="visible content" >Acessar sistema</div>
                <div class="hidden content">Course Factory</div>
            </a>

        </div>
    </form>
</div>

<?php

if(isset($_POST['usuario'])) {

    $usuario = $_POST['usuario'];
    $senha = $_POST['senha'];
    $ficarLogado = 1;


    login($usuario, $senha, $ficarLogado);

}

?>

<script type="text/javascript">
    $(document).ready(function(){


        $("#botao").click(function(){

            $("#logar").submit();

        })








    })



</script>

</body>

</html>