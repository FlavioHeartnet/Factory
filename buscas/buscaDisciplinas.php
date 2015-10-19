<?php
include('../config.php');

$idTurma = $_GET['valor'];
$semestre = $_GET['valor2'];

$sql = "select * from alunos_disciplinas a INNER JOIN diciplinas d on d.idDiciplina = a.idDiciplina where idTurma = '$idTurma' and semestre = '$semestre'";
$busca = $GLOBALS['con']->query($sql);

if($busca == true)


while($RsBusca = $busca->fetch_array())
{

    $idTurma = $RsBusca['idTurma'];
    $sql2 = "select * from turma  where idTurma = '$idTurma'";
    $busca2 = $GLOBALS['con']->query($sql2);
    $busca2 = $busca2->fetch_array();

    $idCurso = $busca2['idCurso'];
    $sql3 = "select * from cursos  where idCurso = '$idCurso'";
    $busca3 = $GLOBALS['con']->query($sql3);
    $busca3 = $busca3->fetch_array();


    ?>
<table class="ui red table" cellpadding="0" cellspacing="0" border="0">

    <tr>
        <td>Nome da Discicplina</td>
        <td>Curso</td>
        <td>Duração</td>

    </tr>

    <tr>

        <td><?php echo utf8_encode($RsBusca['Nome']); ?></td>
        <td><?php echo utf8_encode($busca3['Nome']); ?></td>
        <td><?php echo $RsBusca['cargaHoraria']; ?></td>

    </tr>


</table>


<?php
}

