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
<<<<<<< HEAD

    <div class="ui centered page grid">
        <div class="titlePage">
            Consulta de Aluno

        </div>

=======
    <div class="ui centered page grid">
        <div class="titlePage">
            Consulta de Aluno
            <!--Colocar caixa de busca, que retorne um card com informações da disciplina - JP-->
            <!--Flavio, criar a rotina que mostre somente o card correspondente a busca-->
        </div>
>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa
        <div class="fourteen wide column">

            <!--Input search-->

            <div class="ui search">
                <div class="ui icon input">
<<<<<<< HEAD
                    <input class="prompt"  onkeyup="buscarNoticias(this.value)" type="text" placeholder="Procurar curso...">
                    <i class="search icon"></i>
                </div>
                <div id="resultado"></div>
            </div>
            <br><br>

            <div id="conteudo" class="cadastroCurso column">



=======
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
>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa




                </div><!--Fim card-->
<<<<<<< HEAD

            </div>

        </div>



    </div>


<?php

if(isset($_POST['idAluno']))
{
    if($_POST['deleta'] == 0)
    {

        $idAluno = $_POST['idAluno'];
        deletaAluno($idAluno);

    }


}

?>
<script type="text/javascript">

    $(document).ready(function(){

    });
    var req;

    function editarAluno()
    {

        $("#editarAluno").submit();

    }

    function DeletaAluno()
    {

        $("#deletaaluno").submit();

    }
    function Gerencia()
    {

        $("#gerencia").submit();

    }

    function exibirConteudo(id) {

// Verificando Browser
        if(window.XMLHttpRequest) {
            req = new XMLHttpRequest();
        }
        else if(window.ActiveXObject) {
            req = new ActiveXObject("Microsoft.XMLHTTP");
        }

// Arquivo PHP juntamento com a id da noticia (método GET)
        var url = "buscas/exibir.php?id="+id;

// Chamada do método open para processar a requisição
        req.open("get", url, true);

// Quando o objeto recebe o retorno, chamamos a seguinte função;
        req.onreadystatechange = function() {

            // Exibe a mensagem "Aguarde..." enquanto carrega
            if(req.readyState == 1) {
                document.getElementById('conteudo').innerHTML = 'Aguarde...';
            }

            // Verifica se o Ajax realizou todas as operações corretamente
            if(req.readyState == 4 && req.status == 200) {

                // Resposta retornada pelo exibir.php
                var resposta = req.responseText;

                // Abaixo colocamos a resposta na div conteudo
                document.getElementById('conteudo').innerHTML = resposta;
            }
        }
        req.send(null);
    }



    // FUNÇÃO PARA BUSCA DADOS
    function buscarNoticias(valor) {

// Verificando Browser
        if(window.XMLHttpRequest) {
            req = new XMLHttpRequest();
        }
        else if(window.ActiveXObject) {
            req = new ActiveXObject("Microsoft.XMLHTTP");
        }

// Arquivo PHP juntamente com o valor digitado no campo (método GET)
        var url = "buscas/busca.php?valor="+valor;

// Chamada do método open para processar a requisição
        req.open("get", url, true);

// Quando o objeto recebe o retorno, chamamos a seguinte função;
        req.onreadystatechange = function() {

            // Exibe a mensagem "Buscando Noticias..." enquanto carrega
            if(req.readyState == 1) {
                document.getElementById('resultado').innerHTML = 'Buscando Alunos...';
            }

            // Verifica se o Ajax realizou todas as operações corretamente
            if(req.readyState == 4 && req.status == 200) {

                // Resposta retornada pelo busca.php
                var resposta2 = req.responseText;

                // Abaixo colocamos a(s) resposta(s) na div resultado
                document.getElementById('resultado').innerHTML = resposta2;
            }
        }
        req.send(null);
    }



</script>
=======
            </div>
        </div>
    </div>
</div>


>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa
</body>
</html>
