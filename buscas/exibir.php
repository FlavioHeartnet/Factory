<?php
include('../config.php');

$id = $_GET['id'];

$sql = $GLOBALS['con']->query("SELECT * FROM turma WHERE idTurma =  '$id'");

while($rsSql = $sql->fetch_array())
{
    $idCurso = $rsSql['idCurso'];
    $periodoLetivo = $rsSql['PeriodoLetivo'];

    $curso = $GLOBALS['con']->query("SELECT * FROM cursos WHERE idCurso =  '$idCurso'");
    $cursos = $curso->fetch_array();


    ?>

    <div class="ui  cards">
        <div class="red cardsDisc card">
            <div class="content">
                <div class="header"><?php echo utf8_encode($rsSql['Nome'])?></div>
                <div class="meta">Curso: <?php echo utf8_encode($cursos['Nome']); ?></div>
                <div class="description">

                    Numeros de Alunos: <?php echo utf8_encode($rsSql['numAlunos']) ?><br>

                    <!--Colocar aqui o que for preenchido em "descrição" na página do casdastro-->
                </div>
            </div>
            <div class="extra content ">
                <span class="right floated">

                  <a onclick="editarAluno()" data-dismiss="alert">
                      <i class="write icon"></i>
                      Editar</a> |

                  <a onclick="DeletaAluno()" data-dismiss="alert">


                      <i class="remove icon "></i>

                      Excluir</a>

                    <a onclick="Gerencia()" data-dismiss="alert">


                        <i class="Tasks icon "></i>

                        Gerenciar Disciplinas</a>


                </span>
            </div>
        </div>
    <form id="editarAluno" method="post" action="editar-turma.php">
    <input type="hidden" value="<?php echo $rsSql['idTurma']; ?>" name="idTurma">
        <input type="hidden" value="0" name="edita">
    </form>
    <form id="deletaaluno" action="consultarTurma.php" method="post">
        <input type="hidden" value="<?php echo $id ?>" name="idTurma">
        <input type="hidden" value="0" name="deleta">
    </form>
    <form id="gerencia" action="disciplinasAlunos.php" method="post">
        <input type="hidden" value="<?php echo $id ?>" name="idTurma">
        <input type="hidden" value="<?php echo $rsSql['idCurso']; ?>" name="idCurso">
        <input type="hidden" value="0" name="gerencia">
    </form>


<?php

}

?>