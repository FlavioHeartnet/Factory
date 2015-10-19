<?php
include('../config.php');

$idTurma = $_GET['valor'];
$semestre = $_GET['valor2'];
$idDisciplina = $_GET['valor3'];






    $query2 = $GLOBALS['con']->query("select * from alunos_disciplinas where idTurma = '$idTurma' and idDiciplina = '$idDisciplina' and semestre= '$semestre'");

    if($query2->num_rows <= 0) {

        $sql = "insert into alunos_disciplinas (idTurma,idDiciplina, semestre) values ('$idTurma', '$idDisciplina', '$semestre')";

        $query = $GLOBALS['con']->query($sql);

        if ($query == true) {

            echo "<i class='checkmark  icon'></i>";


        } else {


            echo "<i class='remove icon'></i>";

        }

    }else
    {
        echo "<i class='remove icon'></i><span>Diciplina ja cadastrada no curso</span>";


    }