<?php
include('../config.php');

$idTurma = $_GET['valor'];
$semestre = $_GET['valor2'];
$idDisciplina = $_GET['valor3'];



$turma = $GLOBALS['con']->query("select * from turma where idTurma = '$idTurma'");
$RsTurma = $turma->fetch_array();
$idCurso = $RsTurma['idCurso'];

$modulo = $GLOBALS['con']->query("select * from modulo where idCurso = '$idCurso'");



?>
    <table class="ui red table" cellpadding="0" cellspacing="0" border="0">

        <tr>
            <td>Nome da Discicplina</td>

        </tr>

        <tr>

            <td><select name="disci" class="ui dropdown">
                    <?php

                    while($RsModulo = $modulo->fetch_array()) {

                        $idDisciplina = $RsModulo['idDiciplina'];
                        $sqls = $GLOBALS['con']->query("select * from diciplinas where idDiciplina = '$idDisciplina'");
                        $discplina = $sqls->fetch_array();

                        ?>
                        <option value="<?php echo $idDisciplina ?>"><?php echo utf8_encode($discplina['Nome']); ?></option>
                    <?php

                    }

                    ?>
                </select></td>
            <td><input type="submit" value="Adicionar" onclick="addDisciplina(<?php echo $idTurma ?>, <?php echo $semestre ?>, 0,0)" class="ui green right icon button"></td>
            <td id="check"></td>

        </tr>


    </table>


<?php