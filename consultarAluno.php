<?php

include("topo.php");
include("funcoes.php");

?>

<!DOCTYPE html>
<html>
<head>
    <title> Course Factory SYS - Admin </title>

    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/semantic.css">
    <link rel="stylesheet" type="text/css" href="css/homepage.css">


    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
    <script src="js/semantic.js"></script>
    <script src="js/homepage.js"></script>


</head>


<body id="home">



<div class="ui vertical feature segment">
    <div class="ui centered page grid">
        <div class="titlePage">
            Consulta de Aluno
            <!--Colocar caixa de busca, que retorne um card com informações da disciplina - JP-->
            <!--Flavio, criar a rotina que mostre somente o card correspondente a busca-->
        </div>
        <div class="fourteen wide column">

            <!--Input search-->

            <div class="ui search">
                <div class="ui icon input">
                    <input class="prompt" type="text" placeholder="Procurar curso...">
                    <i class="search icon"></i>
                </div>
                <div class="results"></div>
            </div>
            <br><br>

            <div class="cadastroCurso column">

                <!--<div class="cardsDisc">
                  Novo card-->
                <div class="ui  cards">
                    <div class="red cardsDisc card">
                        <div class="content">
                            <div class="header">Ralphilus Nogueira Silvério</div>
                            <div class="meta">RA: 12000-0</div>
                            <div class="description">
                                Data Matrícula: 02/02/2014<br>
                                Financiado: Não<br>

                                <!--Colocar aqui o que for preenchido em "descrição" na página do casdastro-->
                            </div>
                        </div>
                        <div class="extra content ">
                <span class="right floated">
                  <a class="" data-dismiss="alert">
                      <i class="write icon"></i>
                      Editar</a> |
                  <a class="" data-dismiss="alert">
                      <i class="remove icon "></i>
                      Excluir</a>
                </span>
                        </div>
                    </div>




                </div><!--Fim card-->
            </div>
        </div>
    </div>
</div>


</body>
</html>
