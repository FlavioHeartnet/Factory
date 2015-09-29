<?php
include("topo.php");


?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title> Course Factory SYS - Admin </title>

    <link rel="stylesheet" type="text/css" href="css/semantic.css">
    <link rel="stylesheet" type="text/css" href="css/homepage.css">


    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
    <script src="js/semantic.js"></script>
    <script src="js/homepage.js"></script>
    <script type="text/javascript">


    </script>



</head>


<body id="home">

<div class="ui vertical feature segment">
    <div class="ui centered page grid">
        <div class="titlePage">
            Consulta de disciplina
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
                        <option value="">Selecione a diciplina</option>
                        <?php
                        $query = "select * from diciplinas WHERE 1";
                        $query = $con->query($query);

                        while($rsQuery = $query->fetch_array())
                        {


                        ?>
                        <option value="<?php echo $rsQuery['idDiciplina']; ?>"><?php echo utf8_encode($rsQuery['Nome']); ?></option>
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

                $query = "select * from diciplinas where idDiciplina = '$buscas'";
                $query = $con->query($query);




            }

            while($RsQuery = $query->fetch_array()){

            ?>

            <div class="cadastroDisciplina column">

                <!--<div class="cardsDisc">
                Novo card-->
                <form id="alterar" action ='editarDiciplina.php' method="post">
                <div class="ui  cards">
                    <div class="red cardsDisc card">
                        <div class="content">
                            <div class="header"><?php echo utf8_encode($RsQuery['Nome']); ?></div>
                            <input type="hidden" value="<?php echo $RsQuery['Nome']; ?>" name="nome">
                            <div class="meta"><?php echo $RsQuery['cargaHoraria']; ?></div>
                            <input type="hidden" value="<?php echo $RsQuery['cargaHoraria']; ?>" name="horas">
                            <input type="hidden" value="<?php echo $RsQuery['idDiciplina']; ?>" name="id">
                            <input type="hidden" value="<?php echo $RsQuery['sigla']; ?>" name="sigla">
                            <input type="hidden" value="<?php echo $RsQuery['descricao']; ?>" name="descricao">
                            <div class="description">
                               <p><?php echo $RsQuery['descricao']; ?></p>
                                <!--Colocar aqui o que for preenchido em "descrição" na página do casdastro-->
                            </div>
                        </div>
                        <div class="ui bottom attached button">
                            <a id="deletar" class="close" data-dismiss="alert">
                                <i class="remove icon "></i>
                                Excluir disciplina </a>
                        </div>
                        <div class="ui bottom attached button">
                            <a id="editar" class="close" data-dismiss="alert" href="#">
                                <i class="write icon "></i>
                                Editar disciplina </a>
                        </div>
                    </div>
                </div>
                </form>
            </div>
                <form  id="deletarDisciplina" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">

                    <input type="hidden" name="deletarDisc" value="<?php echo $RsQuery['idDiciplina'] ?>">
                </form>

            <?php

            }
            ?>

        </div>
    </div>

<?php
if(isset($_POST['deletarDisc']))
{
    $idDiciplina = $_POST['deletarDisc'];
    deleteDiciplina($idDiciplina);

}


?>
</body>
<script>
$('#editar').click(function(){

    $('#alterar').submit();

});

$('#deletar').click(function(){

    $('#deletarDisciplina').submit();

});


</script>
</html>
