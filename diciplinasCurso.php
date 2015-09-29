<?php
include("topo.php");


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<body id="home">

<div class="ui vertical feature segment">
    <div class="ui centered page grid">
        <div class="titlePage">
            Diciplinas do Curso
            <!--Colocar caixa de busca, que retorne um card com informações da disciplina - JP-->
            <!--Flavio, criar a rotina que mostre somente o card correspondente a busca-->
        </div>
        <div class="fourteen wide column">
            <div class="ui two column aligned stackable divided grid"></div>
            <!--Input search-->
            <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div id="teste" class="ui search">
                    <div class="ui icon input">
                        <select  class="dropdown" name="busca">
                            <option value="">Selecione o Curso</option>
                            <?php
                            $query = "select * from cursos WHERE 1";
                            $query = $con->query($query);

                            while($rsQuery = $query->fetch_array())
                            {


                                ?>
                                <option value="<?php echo $rsQuery['idCurso']; ?>"><?php echo utf8_encode($rsQuery['Nome']); ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <i class="search icon"> </i>

                    </div>
                    <input type="submit" name="enviar" class="ui green right labeled icon button" value="Pesquisar">
            </form>
            <div class="results"></div>
        </div>
        <br><br>

        <?php
        if(isset($_POST['enviar'])) {
            $buscas = $_POST['busca'];

            $query =  $con->query("select * from cursos where idCurso = '$buscas'");

            $RsQuery = $query->fetch_array();
            $modulo = $RsQuery['Modulo'];


           ?>
        <form id="form" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="cadastroDisciplina column">

                    Diciplinas do modulo/Semestre<br>

                    <div class="ui icon input">
                        <select  class="dropdown buscaMateria" name="modulo">
                            <option value="">Selecione o Modulo</option>
                            <?php


                            for($i = 1;$i <= $modulo; $i++)
                            {


                                ?>
                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <i class="search icon"></i>

                    </div>



                        <input type="hidden" value="<?php echo $buscas ?>" name="idCurso">
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
<?php
if(isset($_POST['gravar'])) {
    $curso = $_POST['idCurso'];
    $modulo = $_POST['modulo'];
    $diciplina = $_POST['busca'];

    addModulo($curso, $modulo, $diciplina);
}
?>
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
</script>

</body>
</html>