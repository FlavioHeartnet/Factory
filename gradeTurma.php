<?php
include("topo.php");

?>
<!DOCTYPE html>
<html>
<link rel="stylesheet" href="css/drag.css">
<body id="home">


<div class="ui vertical feature segment"> <!-- configurando página verticalmente (pixelização vertical)-->
    <div class="ui centered page grid"> <!-- Uma vez que foi configurada a pixelização, configura a centralização-->
        <div class="titlePage">
            Seleção de displinas
        </div>

        <div class="fourteen wide column"> <!--configuração padrão para definição de colunas-->
            <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <div class="ui fluid category search ">
                <div class="ui icon input">
                    <input class="prompt" required="" name="curso" id="" type="text" placeholder="Proucurar curso">

                    <i class="search icon buscarM"></i>
                </div>
                <div class="results"></div>
            </div>
            <br>
            <span>Selecione o modulo</span>
            <div class="column">
                <label>
                    <select required="" class="ui dropdown" name="modulo">
                        <?php $sql2 = $con->query("select * from periodoletivo where 1");

                        while($quey3 = $sql2->fetch_array()){
                            ?>
                            <option value="<?php echo $quey3['idLetivo']; ?>"><?php echo $quey3['Nome']; ?></option>

                        <?php } ?>
                    </select>
                </label>

                <input type="submit" name="result" value="Selecionar" class="ui green right labeled icon button">

            </div>
            </form>


            <?php if(isset($_POST['result']))
            {

              $curso =  utf8_decode($curso = $_POST['curso']);
                $modulo = $_POST['modulo'];


                $sql = "select * from cursos where Nome= '$curso'";
                $query = $con->query($sql);
                $rsCurso = $query->fetch_array();
                $idCurso = $rsCurso['idCurso'];



                $sql = "select * from modulo where idCurso= '$idCurso'";
                $query=$con->query($sql);


                ?>
            <div class="ui two column center aligned stackable divided grid">
               <!--configuração padrão para definição de colunas-->
                <div class="column"> <!-- inicio da coluna da esquerda-->
                    <h3> Disciplinas </h3>
                    <div>
                        <ul id="draggable-elements" class="draggable-elements ui-helper-reset ui-helper-clearfix">


                            <?php   while($rsModulo = $query->fetch_array())
                            {

                                $id = $rsModulo['idDiciplina'];

                                $sql = "select * from diciplinas where idDiciplina= '$id'";
                                $query1 = $con->query($sql);
                                $rsDisc = $query1->fetch_array();

                                $sql = "select * from alunos_disciplinas where idDiciplina= '$id'";
                                $query2 = $con->query($sql);
                                $rsDisc2 = $query2->fetch_array();
                                $letivo = $rsDisc2['PeriodoLetivo'];


                                $sql = "select * from periodoletivo where idLetivo= '$letivo'";
                                $query2 = $con->query($sql);
                                $rsDisc2 = $query2->fetch_array();

                                $sql = "select * from historicoletivo where idLetivo= '$letivo'";
                                $query2 = $con->query($sql);
                                $historico = $query2->fetch_array();

                             ?>
                            <li class="element draggable" style="display:flex">
                                <div class="ui cards ">
                                    <div class="ui red card">
                                        <div class="content">
                                            <div class="header move"><?php echo utf8_encode($rsDisc['Nome']); ?></div><br>
                                            <div class="meta">Periodo Letivo: <?php echo $rsDisc2['Nome']; ?></div>
                                            <div class="meta">Numero de Alunos: <?php echo $historico['numAlunos']; ?></div>
                                            <div class="description">
                                            </div>
                                        </div>
                                        <a href="javascript:void(0)" title="Delete this element" class="icons-fonts close">x</a>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>

                        </ul>
                    </div>
                </div>
                <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
                <div class="column">

                    <!--Campo que recebe as disciplinas arrasta e solta-->
                    <h3> Turmas </h3>
                    <?php

                    $sql = "select * from turma where idCurso = '$idCurso'";
                    $query = $con->query($sql);


                    while($rsTurma = $query->fetch_array()){


                    ?>
                    <br><p class="cadastroLabel">Turma: <?php echo $rsTurma['Nome']; ?></p>
                    <div class="dragdrop-field">
                        <div class="dragdrop-box">
                            <div id="dragndropT1" class="draggable-elements ui-widget-content ui-state-default dragndropT1">

                                <?php
                                $idTurma = $rsTurma['idTurma'];
                                $arrayTurma = array();
                                $arrayTurma = $idTurma;


                                $conect = "select * from alunos_disciplinas a inner join diciplinas d on d.idDiciplina = a.idDiciplina where a.PeriodoLetivo = '$modulo' and a.idTurma = '$idTurma'";
                                $query1 = $con->query($conect);
                                if($query->num_rows != 0 ){
                                    while($rsDisc = $query1->fetch_array()){

                                        $letivo = $rsDisc['PeriodoLetivo'];
                                        $sql = "select * from periodoletivo where idLetivo= '$letivo'";
                                        $query2 = $con->query($sql);
                                        $rsDisc2 = $query2->fetch_array();

                                        $sql = "select * from historicoletivo where idLetivo= '$letivo'";
                                        $query2 = $con->query($sql);
                                        $historico = $query2->fetch_array();

                                        ?>
                                        <li class="element draggable" style="display:flex">
                                            <div class="ui cards ">
                                                <div class="ui red card">
                                                    <div class="content">
                                                        <div class="header move"><?php echo utf8_encode($rsDisc['Nome']); ?></div><br>
                                                        <input type="hidden" name="idAD" value="<?php echo $rsDisc['idAD']; ?>" >
                                                        <input type="hidden" name="idDiciplina" value="<?php echo $rsDisc['idDiciplina']; ?>" >
                                                        <div class="meta">Periodo Letivo:  <?php echo $rsDisc2['Nome']; ?></div>
                                                        <div class="meta">Numero de Alunos:  <?php echo $historico['numAlunos']; ?></div>
                                                        <div class="description">
                                                        </div>
                                                    </div>
                                                    <a href="javascript:void(0)" title="Delete this element" class="icons-fonts close">x</a>
                                                </div>
                                            </div>
                                        </li>

                                    <?php }
                                }?>

                                <p>Arrastar e soltar aqui</p>
                            </div>
                        </div>
                    </div>
                    <?php } ?>



                </div>
                <div class="ui dragdrop-field">

                    <input type="submit" name="salvar" value="salvar" class="ui positive button">

                </div>
                </form>


            </div>
            <?php } ?>
        </div>
    </div>
</div>

<?php

$sql = "select * from cursos";
$query = $con->query($sql);


?>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
<script src="js/semantic.js"></script>
<script type="text/javascript" src="js/drag.js"></script>

<script type="text/javascript">

    var content = [

        <?php while($rsBusca = $query->fetch_array()){ ?>

        { title: '<?php echo utf8_encode($rsBusca['Nome']); ?>' },

        <?php } ?>

        {title: ''}
    ];

    $('.ui.search')
        .search({
            source: content,
            error : {
                source      : 'Cannot search. No source used, and Semantic API module was not included',
                noResults   : 'Curso não encontrado!',
                logging     : 'Error in debug logging, exiting.',
                noTemplate  : 'A valid template name was not specified.',
                serverError : 'There was an issue with querying the server.',
                maxResults  : 'Results must be an array to use maxResults setting',
                method      : 'The method you called is not defined.'
            }
        });

</script>
</body>
</html>