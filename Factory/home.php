<?php
include("topo.php");
include("funcoes.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title> Course Factory SYS - Admin </title>

    <link rel="stylesheet" type="text/css" href="css/semantic.css">
    <link rel="stylesheet" type="text/css" href="css/homepage.css">


    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
    <script src="js/semantic.js"></script>
    <script src="js/homepage.js"></script>


</head>


<body id="home">


<div class="ui vertical feature segment">
    <div class="ui centered page grid">
        <div class="fourteen wide column">
            <div class="ui three column center aligned stackable divided grid">
                <div class="column">

                    <div class="ui icon header">
                        <i class="icon student "></i>
                        Cadastrar Disciplina
                    </div>
                    <p>Cadastro de uma nova disciplina</p>
                    <p>
                        <a class="ui right labeled icon button" href="cadastro-diciplina.php">
                            Cadastrar
                            <i class="right chevron icon"></i>
                        </a>
                    </p>
                </div>
                <div class="column">

                    <div class="ui icon header">
                        <i class="icon search "></i>
                        Procurar Disciplina
                    </div>
                    <p>Procurar por disciplina</p>
                    <p>
                        <a class="ui right labeled icon button" href="consultarDiciplina.php">
                            Procurar
                            <i class="right chevron icon"></i>
                        </a>
                    </p>
                </div>
                <div class="column">
                    <div class="ui icon header">
                        <i class="user icon"></i>
                        Editar Disciplina
                    </div>
                    <p>Nesta area você pode alterar informações das diciplinas cadastradas</p>
                    <p>
                        <a class="ui button" href="#">
                            Editar
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>