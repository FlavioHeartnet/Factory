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

<?php

if(isset($_POST['idAluno']))
{

    $idAluno = $_POST['idAluno'];
    $idCurso = $_POST['idCurso'];

    $buscaDiscAlunos = $con->query("SELECT * FROM alunos_disciplinas  where idAluno = '$idAluno'");
    $row = $buscaDiscAlunos->num_rows;
    if($row<=0){

    $sql = "select * from modulo m inner join diciplinas d on m.idDiciplina = d.idDiciplina where idCurso = '$idCurso'";

    }else{

        $sql = "SELECT * FROM alunos_disciplinas a inner join diciplinas d on a.idDiciplina = d.idDiciplina where a.idAluno = '$idAluno'";
    }



    $queryCurso=$con->query("select * from cursos where idCurso = '$idCurso'");
    $rsCurso = $queryCurso->fetch_array();
    $modulo = $rsCurso['Modulo'];





}


?>
<div class="ui vertical feature segment">
    <div class="ui centered page grid">

        <div class="titlePage">
            Disciplinas do Aluno
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
                            <th>Data do Termino</th>
                            <th></th>
                        </tr>
                        </thead>

                    <?php
                    $query=$con->query($sql);
                    while($busca= $query->fetch_array()) {
                    $semestre = $busca['semestre'];

                    if($semestre == $i){



                        ?>
                                <tbody>
                                <tr>
                                    <td>
                                        <label>
                                            <select onload="buscaRequisitos(this.value, <?php echo $idCurso;?> )" onchange="buscaRequisitos(this.value, <?php echo $idCurso;?> )" class="ui dropdown" name="disciplina[]">

                                                <option value="<?php echo $busca['idDiciplina'];  ?>"><?php echo $busca['Nome'];  ?></option>
                                                <?php

                                                $query2 = $con->query("select * from modulo m inner join diciplinas d on m.idDiciplina = d.idDiciplina where idCurso = '$idCurso'");
                                                while($diciplinas= $query2->fetch_array()) { ?>

                                                    <option value="<?php echo $diciplinas['idDiciplina'];  ?>"><?php echo utf8_encode($diciplinas['Nome']);  ?></option>

                                                <?php } ?>


                                            </select>
                                        </label>
                                        <input type="hidden" name="idCurso" value="<?php echo $busca['idCurso'];  ?>">
                                        <input type="hidden" name="idAluno" value="<?php echo $idAluno  ?>">
                                        <input type="hidden" name="semestre[]" value="<?php echo $i  ?>">
                                        <input type="hidden" name="id[]" value="<?php echo $busca['idAD']  ?>">
                                    </td>
                                    <td><label>
                                            <input type="text" name="carga[]" value="<?php echo $busca['cargaHoraria'];  ?>"
                                                   class="inputDisciplina">
                                        </label></td>
                                    <td><label id="resultado">


                                        </label></td>
                                    <td><label>
                                            <select class="ui dropdown" name="Situacao[]">

                                                <option value="1">Aprovado</option>
                                                <option value="2">Cursando</option>
                                                <option value="3">Reprovado</option>
                                                <option value="4">Não Iniciado</option>
                                            </select>
                                        </label></td>
                                    <td>
                                        <label>
                                            <input class="inputDisciplina" name="finalizado[]" value="" type="date" placeholder="dd/mm/aaaa">
                                        </label>
                                    </td>

                                </tr>



                                </tbody>
                        <?php }
                    }
                    ?>

                    </table>


                    <br>
                <?php } ?>

                <input class="ui gray right labeled icon button" name="salvar" value="Salvar" type="submit">
                <i class="right chevron icon"></i>



                <hr><br>
            </form>
        </div>


    </div>

</div>

<?php
if(isset($_POST['salvar']))
{
    $idAluno = $_POST['idAluno'];
    $idDiciplina = $_POST['disciplina'];
    $carga = $_POST['carga'];
    $requisito = $_POST['requisito'];
    $situacao = $_POST['Situacao'];
    $conclusao = $_POST['finalizado'];
    $semestre = $_POST['semestre'];
    $id = $_POST['id'];
    alunosDisc($idAluno, $idDiciplina, $carga, $requisito,$situacao, $conclusao, $semestre, $id);
}
?>
<script type="text/javascript">

    function buscaRequisitos(valor, valor2) {

// Verificando Browser
        if(window.XMLHttpRequest) {
            req = new XMLHttpRequest();
        }
        else if(window.ActiveXObject) {
            req = new ActiveXObject("Microsoft.XMLHTTP");
        }

// Arquivo PHP juntamente com o valor digitado no campo (método GET)
        var url = "buscas/requisitos.php?valor="+valor+"&valor2="+valor2;
        alert(valor +" "+valor2);

// Chamada do método open para processar a requisição
        req.open("get", url, true);

// Quando o objeto recebe o retorno, chamamos a seguinte função;
        req.onreadystatechange = function() {

            // Exibe a mensagem "Buscando Noticias..." enquanto carrega
            if(req.readyState == 1) {
                document.getElementById('resultado').innerHTML = 'Buscando Pre-Requisito...';
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