<?php
include("topo.php");

?>
<!DOCTYPE html>
<html>

<body id="home">

<div class="ui vertical feature segment">
    <div class="ui centered page grid">
        <div class="titlePage">
            Cadastro de turmas equivalentes
        </div>

      <!--  <div class="three wide column">
            <div class="ui two column aligned stackable divided grid">

                <div class="ui search">
                    <div class="ui icon input">
                        <input class="prompt" type="text" placeholder="Escolher disciplina...">
                        <i class="search icon"></i>
                    </div>
                    <div id="results"></div>
                </div>  </div>-->



            <div class="fourteen wide column">
                <div class="ui two column aligned stackable divided grid"></div>
                <!--Input search-->
                <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <div id="teste" class="ui search">
                        <div class="ui icon input">
                            <select  class="dropdown" name="busca">
                                <option value="">Selecione a disciplina</option>
                                <?php
                                $query = "select * from diciplinas WHERE 1";
                                $query = $con->query($query);

                                while($rsQuery = $query->fetch_array())
                                {


                                    ?>
                                    <option value="<?php echo $rsQuery['idDisciplina']; ?>"><?php echo utf8_encode($rsQuery['Nome']); ?></option>
                                <?php
                                }
                                ?>
                            </select>
                            <i class="search icon"> </i>

                        </div>
                        <input type="submit" name="enviar" class="ui green right labeled icon button" value="Selecionar">
                </form>

            </div>
            <br><br>

            <?php
            if(isset($_POST['enviar'])) {
                $buscas = $_POST['busca'];

                $query =  $con->query("select * from diciplinas  ");

                $RsQuery = $query->fetch_array();

                $requisito = $con->query("select * from alunos_disciplinas where idDiciplina = '$buscas'");
                $requisito = $requisito->fetch_array();
                $requisito = $requisito['prerequisito'];

                ?>
                <form id="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                    <div class="cadastroDisciplina column">

                        Diciplinas <br>


                        <input type="hidden" value="<?php echo $buscas ?>" name="idDisciplina">
                        <div id="tudo">
                            <table style="margin-top: 20px" class="table" border="0" cellpadding="2" cellspacing="4">


                                <tr>
                                    <td class="bd_titulo" width="10">Diciplinas</td>
                                </tr>
                                <tr class="linhas">

                                    <td><select class="dropdown" name="busca[]">
                                            <option value="">Selecione a diciplina</option>
                                            <?php
                                            $query = "select * from diciplinas WHERE 1";
                                            $query = $con->query($query);

                                            while ($rsQuery = $query->fetch_array()) {


                                                ?>
                                                <option
                                                    value="<?php echo $rsQuery['idDiciplina']; ?>"><?php echo $rsQuery['Nome']; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select></td>

                                    <td><a href="#" class="removerCampo" title="Remover linha"><img
                                                src="img/close-icon.png" height="25px" border="0"/></a></td>
                                </tr>
                                <tr>
                                    <td colspan="1">
                                        <input type="button" value="Adicionar diciplina" class="adicionarCampo button"
                                               name="add">

                                    </td>
                                </tr>
                                <tr >
                                    <td  align="right" colspan="4"><input style="margin-top: 50px" type="submit" name="gravar" class="ui green right labeled icon button" value="Cadastrar"></td>
                                </tr>
                            </table>



                        </div>
                    </div>
                </form>
            <?php

            }// fim da pesquisa do if Buscar
            ?>

        </div>
        <a href="consultarCurso.php" class= "ui green right labeled icon button">Consultar Curso<i class="ui white icon"></i></a>
    </div>



        </div>



    </div>
</div>

    <script type="text/javascript">
        $(function () {
            function removeCampo() {
                $(".removerCampo").unbind("click");
                $(".removerCampo").bind("click", function () {
                    if($("tr.linhas").length > 1){
                        $(this).parent().parent().remove();
                    }
                });
            }

            $(".adicionarCampo").click(function () {
                novoCampo = $("tr.linhas:first").clone();
                novoCampo.find("input").val("");
                novoCampo.insertAfter("tr.linhas:last");
                removeCampo();
            });
        });



        $('.ui.search')
            .search({
                source: content,
                error : {
                    source      : 'Cannot search. No source used, and Semantic API module was not included',
                    noResults   : 'Usuario não encontrado!',
                    logging     : 'Error in debug logging, exiting.',
                    noTemplate  : 'A valid template name was not specified.',
                    serverError : 'There was an issue with querying the server.',
                    maxResults  : 'Results must be an array to use maxResults setting',
                    method      : 'The method you called is not defined.'
                }

            });



        var req;
        function buscaDisc(valor, valor2, contador) {

// Verificando Browser
            if(window.XMLHttpRequest) {
                req = new XMLHttpRequest();
            }
            else if(window.ActiveXObject) {
                req = new ActiveXObject("Microsoft.XMLHTTP");
            }

// Arquivo PHP juntamente com o valor digitado no campo (método GET)
            var url = "buscas/requisitos.php?valor="+valor+"&valor2="+valor2;


// Chamada do método open para processar a requisição
            req.open("get", url, true);

// Quando o objeto recebe o retorno, chamamos a seguinte função;
            req.onreadystatechange = function() {

                // Exibe a mensagem "Buscando Noticias..." enquanto carrega
                if(req.readyState == 1) {
                    document.getElementById('resultado'+contador).innerHTML = 'Buscando Pre-Requisito...';
                }

                // Verifica se o Ajax realizou todas as operações corretamente
                if(req.readyState == 4 && req.status == 200) {

                    // Resposta retornada pelo busca.php
                    var resposta2 = req.responseText;

                    // Abaixo colocamos a(s) resposta(s) na div resultado
                    document.getElementById('resultado'+contador).innerHTML = resposta2;
                }
            };
            req.send(null);
        }

    </script>

<?php

if(isset($_POST['gravar'])) {
    $disciplina = $_POST['idDisciplina'];
    $diciplinas = $_POST['busca'];

    iserirEquivalente($disciplina, $diciplinas, $requisito);
}

?>

</body>
</html>