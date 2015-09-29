<?php
include("topo.php");


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">

<body id="home">

<div class="ui vertical feature segment">
    <div class="ui centered page grid">
        <div class="titlePage">
            Consulta de Curso
            <!--Colocar caixa de busca, que retorne um card com informações da disciplina - JP-->
            <!--Flavio, criar a rotina que mostre somente o card correspondente a busca-->
        </div>
        <div class="fourteen wide column">
            <div class="ui two column aligned stackable divided grid"></div>
            <!--Input search-->
            <form  action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                <div id="teste" class="ui search">
                    <div class="ui icon input">
                        <select  class="ui dropdown" name="busca">
                            <option value="">Selecione o Curso</option>
                            <?php
                            $query = "select * from cursos WHERE 1";
                            $query = $con->query($query);

                            while($rsQuery = $query->fetch_array())
                            {


                                ?>
                                <option value="<?php echo $rsQuery['idCurso']; ?>"><?php echo $rsQuery['Nome']; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <i class="search icon"> </i>

                    </div>
                    <input type="submit" class="ui green right labeled icon button" value="Pesquisar">
            </form>
            <div class="results"></div>
        </div>
        <br><br>

        <?php
        if(isset($_POST['busca']))
        {
            $buscas = $_POST['busca'];

            $query = "select * from cursos where idDiciplina = '$buscas'";
            $rsCurso = $con->query($query);
            while($RsQuery = $rsCurso->fetch_array()) {

            ?>

            <div class="cadastroDisciplina column">

                <!--<div class="cardsDisc">
                Novo card-->
                <form id="alterar" action='editarDiciplina.php' method="post">
                    <div class="ui  cards">
                        <div class="red cardsDisc card">
                            <div class="content">
                                <div class="header"><?php echo $RsQuery['Nome']; ?></div>
                                <div class="header"><?php echo $RsQuery['Cordenador']; ?></div>
                                <input type="hidden" value="<?php echo $RsQuery['Nome']; ?>" name="nome">

                                <div class="meta"><?php echo $RsQuery['codMac']; ?></div>
                                <div class="meta"><?php echo $RsQuery['modulo']; ?></div>
                                <input type="hidden" value="<?php echo $RsQuery['codMac']; ?>" name="horas">
                                <input type="hidden" value="<?php echo $RsQuery['idCurso']; ?>" name="id">
                                <input type="hidden" value="<?php echo $RsQuery['dataAutoMac']; ?>" name="sigla">
                                <input type="hidden" value="<?php echo $RsQuery['modulo']; ?>" name="descricao">

                                <div class="description">
                                    <p><?php echo $RsQuery['dataAutoMac']; ?></p>
                                    <!--Colocar aqui o que for preenchido em "descrição" na página do casdastro-->
                                </div>
                            </div>
                            <div class="ui bottom attached button">
                                <a class="close" data-dismiss="alert">
                                    <i class="remove icon "></i>
                                    Excluir disciplina </a>
                            </div>
                            <div class="ui bottom attached button">
                                <a class="close" data-dismiss="alert" href="#">
                                    <i class="write icon "></i>
                                    Editar disciplina </a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        <?php
            }
        }
        ?>

    </div>
</div>


</body>
<script>
    $('.close').click(function(){

        $('#alterar').submit();

    });


</script>
</html>
