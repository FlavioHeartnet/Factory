<?php
include("topo.php");

?>
<!DOCTYPE html>
<html>



<body id="home">

<?php
$modulo = 0;

if(isset($_POST['idTurma']))
{

    $idTurma = $_POST['idTurma'];
    $idCurso = $_POST['idCurso'];

    $buscaDiscAlunos = $con->query("SELECT * FROM alunos_disciplinas  where idTurma = '$idTurma'");
    $row = $buscaDiscAlunos->num_rows;
    if($row<=0){

    $sql = "select * from modulo m inner join diciplinas d on m.idDiciplina = d.idDiciplina where idCurso = '$idCurso'";

    }else{

        $sql = "SELECT * FROM alunos_disciplinas a inner join diciplinas d on a.idDiciplina = d.idDiciplina where a.idTurma = '$idTurma'";
    }



    $queryCurso=$con->query("select * from cursos where idCurso = '$idCurso'");
    $rsCurso = $queryCurso->fetch_array();
    $modulo = $rsCurso['Modulo'];





}else
{
    header("Location: consultarTurma.php");

}


?>
<div class="ui vertical feature segment">
    <div class="ui centered page grid">

        <div class="titlePage">
            Disciplinas da Turma
        </div>

        <div class="fourteen wide column">
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

                    <div class="ui left TituloModulos">Disciplinas</div>
                    <hr><br>
                    <?php  for($i=1; $i<=$modulo;$i++){


                        ?>
                        <div class="ui left Modulos"><?php echo $i?>º Módulo </div>
                    <table class="ui red table">
                        <thead>
                        <tr>
                            <th>Disciplina</th>
                            <th>Carga Horaria</th>
                            <th>Pré - Requisito</th>
                            <th>Situação</th>
                            <th>Periodo Letivo: </th>
                            <th></th>
                        </tr>
                        </thead>

                    <?php
                    $query=$con->query($sql);
                    $contador = 0 ;
                    while($busca= $query->fetch_array()) {
                    $semestre = $busca['semestre'];

                    if($semestre == $i){



                        ?>
                                <tbody>
                                <tr>
                                    <td>
                                        <label>
                                            <select onclick="buscaRequisitos(this.value, <?php echo $idCurso;?>,  <?php echo $contador; ?> )" class="ui dropdown" name="disciplina[]">

                                                <option value="<?php echo $busca['idDiciplina'];  ?>"><?php echo $busca['Nome'];  ?></option>
                                                <?php

                                                $query2 = $con->query("select * from modulo m inner join diciplinas d on m.idDiciplina = d.idDiciplina where idCurso = '$idCurso'");
                                                while($diciplinas= $query2->fetch_array()) { ?>

                                                    <option value="<?php echo $diciplinas['idDiciplina'];  ?>"><?php echo utf8_encode($diciplinas['Nome']);  ?></option>

                                                <?php } ?>


                                            </select>
                                        </label>
                                        <input type="hidden" name="idCurso" value="<?php echo $idCurso  ?>">
                                        <input type="hidden" name="idTurma" value="<?php echo $idTurma;  ?>">
                                        <input type="hidden" name="semestre[]" value="<?php echo $i  ?>">
                                        <input type="hidden" name="id[]" value="<?php if(isset($busca['idAD'] )){ echo $busca['idAD']; }else{ echo $busca['idModulo'];  }  ?>">
                                    </td>
                                    <td><label>
                                            <input type="text" name="carga[]" value="<?php echo $busca['cargaHoraria'];  ?>"
                                                   class="inputDisciplina">
                                        </label></td>
                                    <td><label id="resultado<?php echo $contador ?>">

                                            <?php

                                            $valor = $busca['idDiciplina'];



                                            $requisito1= $con->query("select * from modulo where idDiciplina = '$valor' and idCurso = '$idCurso'");


                                            while($rs = $requisito1->fetch_array())
                                            {
                                                $requisito = $rs['prerequisito'];
                                                $query2 = $con->query("select * from diciplinas where idDiciplina = '$requisito'");
                                                $rsQuery = $query2->fetch_array();

                                                if($rs['prerequisito'] == 0 or $rs['prerequisito'] == "") {
                                                    ?>

                                                    <p>Sem Pre-Requisitos</p>
                                                    <input type="hidden" value="0" name="requisito[]">

                                                <?php
                                                }else
                                                {
                                                    ?>

                                                    <p><?php echo $rsQuery['Nome'] ?></p>
                                                    <input type="hidden" value="<?php echo $rsQuery['idDiciplina'] ?>" name="requisito[]">
                                                <?php
                                                }

                                            }




                                            ?>


                                        </label></td>
                                    <td><label>
                                            <select class="ui dropdown" name="Situacao[]">
                                                <?php
                                                $valor = $busca['idDiciplina'];
                                                $ativo = $con->query("select * from alunos_disciplinas where idDiciplina ='$valor' and idTurma = '$idTurma'");

                                                while($quey3 = $ativo->fetch_array()) {
                                                    $ativos = $quey3['situacao'];

                                                    switch($ativos)
                                                    {
                                                        case 1: $texto = 'Não cursado';
                                                            break;
                                                        case 2: $texto = 'Cursando';
                                                            break;
                                                        case 3: $texto = 'Cursado';
                                                            break;

                                                        default: $texto = 'valor incorreto';


                                                    }


                                                    ?>

                                                    <option
                                                        value="<?php echo $ativos; ?>"><?php echo $texto ?></option>

                                                <?php
                                                }
                                                ?>
                                                <option value="1">Não cursado</option>
                                                <option value="2">Cursando</option>
                                                <option value="3">Cursado</option>

                                            </select>
                                        </label></td>

                                    <td>
                                        <label>
                                            <select class="ui dropdown" name="finalizado[]">
                                                <?php

                                                $valor = $busca['idDiciplina'];
                                                $letivo = $con->query("select * from alunos_disciplinas where idDiciplina ='$valor' and idTurma = '$idTurma'");
                                                $letivo2 = $letivo->fetch_array();
                                                $idLe = $letivo2['PeriodoLetivo'];
                                                $sql2 = $con->query("select * from periodoletivo where idLetivo = '$idLe'");

                                                while($quey3 = $sql2->fetch_array()) {
                                                    ?>

                                                    <option
                                                        value="<?php echo $quey3['idLetivo']; ?>"><?php echo $quey3['Nome']; ?></option>

                                                <?php
                                                }
                                                $sql2 = $con->query("select * from periodoletivo where 1");

                                                while($quey3 = $sql2->fetch_array()){
                                                    ?>
                                                    <option value="<?php echo $quey3['idLetivo']; ?>"><?php echo $quey3['Nome']; ?></option>

                                                <?php } ?>
                                            </select>
                                        </label>
                                    </td>


                                </tr>



                                </tbody>
                        <?php }
                        $contador++;
                    }
                    ?>


                        <tr>
                            <td colspan="1"><a href="#" onclick="EscolherDisc(<?php echo $idTurma ?>,<?php echo $i ?>,0,2)" class="ui green right icon button dist">Adicionar disciplina</a></td>
                        </tr>


                    </table>


                    <br>
                <?php } ?>

                <input class="ui gray right labeled icon button" name="salvar" value="Salvar" type="submit">
                <i class="right chevron icon"></i>



                <hr><br>
            </form>

                <div class="ui left TituloModulos">Periodos</div>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <table class="ui red table">

                    <tr>

                        <td>Periodo</td>
                        <td>Numero de alunos</td>
                        <td>Disciplinas</td>

                    </tr>


                        <?php

                        $sql3 = "SELECT * FROM historicoletivo h inner join periodoletivo p on h.idLetivo = p.idLetivo where h.idTurma = '$idTurma'";
                       $turma = $con->query($sql3);

                        if($turma == true) {

                           for($i=0;$i < $modulo; $i++)
                           {


                                ?>

                    <tr>

                                <td><label>
                                        <select required="" class="ui dropdown" name="letivo[]">
                                            <?php
                                            $x = $i+1;

                                            $letivo = $con->query("select * from historicoletivo where semestre ='$x' and idTurma = '$idTurma'");
                                            $letivo2 = $letivo->fetch_array();
                                            $idLe = $letivo2['idLetivo'];
                                            $sql2 = $con->query("select * from periodoletivo where idLetivo = '$idLe'");

                                            if(!$sql2->num_rows <= 0) {

                                                while ($quey3 = $sql2->fetch_array()) {
                                                    ?>

                                                    <option
                                                        value="<?php echo $quey3['idLetivo']; ?>"><?php echo $quey3['Nome']; ?></option>

                                                <?php
                                                }

                                            }else{  ?> <option
                                                value="0">Não selecionado</option>  <?php   }

                                            $sql2 = $con->query("select * from periodoletivo where 1");

                                            while($quey3 = $sql2->fetch_array()){
                                                ?>
                                                <option value="<?php echo $quey3['idLetivo']; ?>"><?php echo $quey3['Nome']; ?></option>

                                            <?php } ?>
                                        </select>
                                    </label></td>
                                <td><label>
                                        <input placeholder="Numero de alunos:<?php echo $letivo2['numAlunos'] ?> "  type="text" class="inputDisciplina" name="numAlunos[]">
                                        <input  type="hidden" value="<?php echo $idTurma?>" name="idTurma">
                                        <input  type="hidden" value="<?php echo $idCurso?>" name="idCurso">
                                    </label></td>
                                <td><a href="#" onclick="buscaDisciplinas(<?php echo $idTurma ?>, <?php echo $i+1 ?>)" class="ui button primary dist">Disciplinas Cursadas</a></td>
                    </tr>

                           <?php }
                        }?>
                <tr>

                    <td><input type="submit" name="tabelaAlunos" class="ui gray right labeled icon button" value="Salvar"><i class="right chevron icon"></i></td>

                </tr>





                </table>
            </form>

        </div>



        <div class="ui basic modal">
            <i class="close icon"></i>
            <div class="header">
                Disciplinas
            </div>

            <div id="resultadoA"></div>


        </div>




    </div>

</div>



<?php
if(isset($_POST['salvar']))
{
    $idTurma = $_POST['idTurma'];
    $idDiciplina = $_POST['disciplina'];
    $carga = $_POST['carga'];
    $requisito = $_POST['requisito'];
    $situacao = $_POST['Situacao'];
    $conclusao = $_POST['finalizado'];
    $semestre = $_POST['semestre'];
    $id = $_POST['id'];



        alunosDisc($idTurma, $idDiciplina, $carga, $requisito, $situacao, $conclusao, $semestre, $id);




}elseif(isset($_POST['tabelaAlunos']))
{
    $numAlunos = $_POST['numAlunos'];
    $conclusao = $_POST['letivo'];



    historicoletivo($modulo, $numAlunos, $idCurso,$idTurma, $conclusao);

}


?>
<script type="text/javascript">







$('.dist').click(function(){


    $('.ui.basic.modal')
        .modal('show');

});



var req;

    function buscaRequisitos(valor, valor2, valor3) {

        var tipo = 'resultado'+valor3;


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
                document.getElementById(tipo).innerHTML = 'Buscando Pre-Requisito...';
            }

            // Verifica se o Ajax realizou todas as operações corretamente
            if(req.readyState == 4 && req.status == 200) {

                // Resposta retornada pelo busca.php
                var resposta2 = req.responseText;

                // Abaixo colocamos a(s) resposta(s) na div resultado
                document.getElementById(tipo).innerHTML = resposta2;
            }
        };
        req.send(null);
    }

var req2;
function buscaDisciplinas(valor, valor2) {

    var tipo = 'resultadoA';


// Verificando Browser
    if(window.XMLHttpRequest) {
        req2 = new XMLHttpRequest();
    }
    else if(window.ActiveXObject) {
        req2 = new ActiveXObject("Microsoft.XMLHTTP");
    }

// Arquivo PHP juntamente com o valor digitado no campo (método GET)
    var url = "buscas/buscaDisciplinas.php?valor="+valor+"&valor2="+valor2;


// Chamada do método open para processar a requisição
    req2.open("get", url, true);

// Quando o objeto recebe o retorno, chamamos a seguinte função;
    req2.onreadystatechange = function() {

        // Exibe a mensagem "Buscando Noticias..." enquanto carrega
        if(req2.readyState == 1) {
            document.getElementById(tipo).innerHTML = 'Buscando Dsiciplinas...';
        }

        // Verifica se o Ajax realizou todas as operações corretamente
        if(req2.readyState == 4 && req2.status == 200) {

            // Resposta retornada pelo busca.php
            var resposta2 = req2.responseText;

            // Abaixo colocamos a(s) resposta(s) na div resultado
            document.getElementById(tipo).innerHTML = resposta2;
        }
    };
    req2.send(null);
}

var req3;

function EscolherDisc(valor, valor2, valor3, valor4) {

    var tipo = 'resultadoA';


// Verificando Browser
    if(window.XMLHttpRequest) {
        req3 = new XMLHttpRequest();
    }
    else if(window.ActiveXObject) {
        req3 = new ActiveXObject("Microsoft.XMLHTTP");
    }

// Arquivo PHP juntamente com o valor digitado no campo (método GET)
    var url = "buscas/exibirDisc.php?valor="+valor+"&valor2="+valor2+"&valor3="+valor3+"&valor4="+valor4;


// Chamada do método open para processar a requisição
    req3.open("get", url, true);

// Quando o objeto recebe o retorno, chamamos a seguinte função;
    req3.onreadystatechange = function() {

        // Exibe a mensagem "Buscando Noticias..." enquanto carrega
        if(req3.readyState == 1) {
            document.getElementById(tipo).innerHTML = 'Buscando Dsiciplinas...';
        }

        // Verifica se o Ajax realizou todas as operações corretamente
        if(req3.readyState == 4 && req3.status == 200) {

            // Resposta retornada pelo busca.php
            var resposta2 = req3.responseText;

            // Abaixo colocamos a(s) resposta(s) na div resultado
            document.getElementById(tipo).innerHTML = resposta2;
        }
    };
    req3.send(null);
}

function addDisciplina(valor, valor2, valor3,valor4) {


    var valor3 = $("select[name='disci']").val();

    var tipo = 'check';


// Verificando Browser
    if(window.XMLHttpRequest) {
        req2 = new XMLHttpRequest();
    }
    else if(window.ActiveXObject) {
        req2 = new ActiveXObject("Microsoft.XMLHTTP");
    }

// Arquivo PHP juntamente com o valor digitado no campo (método GET)
    var url = "buscas/addDisciplina.php?valor="+valor+"&valor2="+valor2+"&valor3="+valor3+"&valor4="+valor4;


// Chamada do método open para processar a requisição
    req2.open("get", url, true);

// Quando o objeto recebe o retorno, chamamos a seguinte função;
    req2.onreadystatechange = function() {

        // Exibe a mensagem "Buscando Noticias..." enquanto carrega
        if(req2.readyState == 1) {
            document.getElementById(tipo).innerHTML = 'Adicionando...';
        }

        // Verifica se o Ajax realizou todas as operações corretamente
        if(req2.readyState == 4 && req2.status == 200) {

            // Resposta retornada pelo busca.php
            var resposta2 = req2.responseText;

            // Abaixo colocamos a(s) resposta(s) na div resultado
            document.getElementById(tipo).innerHTML = resposta2;
        }
    };
    req2.send(null);
}



</script>

</body>
</html>