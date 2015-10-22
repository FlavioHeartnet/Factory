<?php

include("topo.php");


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
            Consulta de Curso

        </div>
        <div class="fourteen wide column">
            <div class="ui two column aligned stackable divided grid"></div>
            <!--Input search-->

            <?php
                $start = 1;
                $sql = "select * from cursos where '$start'";
                $rssql=$con->query($sql);

            ?>

            <div class="ui search">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="ui icon input">

                    <select class="ui dropdown" name="curso">
                        <option value="0">Selecione um curso</option>

                        <?php

                        while($buscaCurso = $rssql->fetch_array()){

                            ?>
                            <option value="<?php echo $buscaCurso['idCurso']; ?>"><?php echo utf8_encode($buscaCurso['Nome']);  ?></option>

                        <?php

                        }

                        ?>



                    </select>

                    <i class="search icon"></i>




                </div>
                <div class="results">
                    <input class="ui green right labeled icon button" type="submit" name="cursos" value="Pesquisar">

                </div>
                </form>
            </div>
            <br><br>



                    <div class="cadastroCurso column">

                        <?php

                        if(isset($_POST['cursos'])) {


                            $idCurso = $_POST['curso'];

                            $sql = "select * from cursos where idCurso= '$idCurso'";
                            $rssql =$con->query($sql);


                        }

                        while($buscaCurso = $rssql->fetch_array()){
                                $modulo = $buscaCurso['Modulo'];
                                $idCurso = $buscaCurso['idCurso'];
                            ?>


                        <div class="ui  cards">
                            <div class="red cardsDisc card">
                                <div class="content">
                                    <div class="header"><?php echo utf8_encode($buscaCurso['Nome']); ?></div>
                                    <div class="meta">Coordenador: <?php echo $buscaCurso['Cordenador']; ?></div>
                                    <div class="description">
                                        Modulos: <?php echo $modulo ?><br>
                                        Código MEC: <?php echo $buscaCurso['codMac']; ?><br>
                                        Duração: <?php

                                        if($modulo == 8) {

                                            echo "4 anos";
                                        }else if($modulo == 4)
                                        {
                                            echo "2 anos";

                                        }else if($modulo == 10 or $modulo == 9)
                                        {
                                            echo "5 anos";
                                        }else if($modulo == 0){


                                            echo "não ha modulos para este curso";
                                        }
                                        ?>

                                        <!--Colocar aqui o que for preenchido em "descrição" na página do casdastro-->
                                    </div>
                                </div>
                                <div class="extra content ">
                 <form id="alterar" method="post" action="alterarCurso.php">
                     <input type="hidden" name="idCurso" value="<?php echo $idCurso ?>">


                <span class="right floated">
                  <a class="alterar" data-dismiss="alert">
                      <i class="write icon"></i>
                      Editar</a> |
                    </form>
                 <form id="excluir" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                     <input type="hidden" name="excluirCurso" value="<?php echo $idCurso ?>">
                     <input type="hidden" name="semestre" value="<?php echo $buscaCurso['Modulo'] ?>">
                  <a class="excluir" data-dismiss="alert">
                      <i class="remove icon "></i>
                      Excluir</a>

                 </form>
                                </div>
                            </div>


                        </div>


                            <?php
                            }

                            ?>
                    </div>




        </div>
    </div>
</div>


<?php

    if(isset($_POST['excluirCurso']))
    {
        $idCurso = $_POST['excluirCurso'];
        $semestre = $_POST['semestre'];
        deletaModulo($idCurso,$semestre);
        deleteCurso($idCurso);

    }

?>

<script type="text/javascript">

    $( document ).ready(function() {

        $('.alterar').click(function(){


            $('#alterar').submit();

        });

        $('.excluir').click(function(){


            $('#excluir').submit();

        });


    });



</script>
</body>
</html>
