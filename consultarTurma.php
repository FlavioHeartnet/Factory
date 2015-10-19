<?php

include("topo.php");


?>

<!DOCTYPE html>
<html>



<body id="home">



<div class="ui vertical feature segment">

    <div class="ui centered page grid">
        <div class="titlePage">
            Consulta da Turma

        </div>

        <div class="fourteen wide column">

            <!--Input search-->

            <div class="ui search">
                <div class="ui icon input">
                    <input class="prompt"  onkeyup="buscarNoticias(this.value)" type="text" placeholder="Procurar curso...">
                    <i class="search icon"></i>
                </div>
                <div id="resultado"></div>
            </div>
            <br><br>

            <div id="conteudo" class="cadastroCurso column">


                </div><!--Fim card-->

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
        };
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
</body>
</html>
