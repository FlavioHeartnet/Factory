<?php
include('../config.php');

$idLetivo = $_GET['valor'];
$idDisciplina = $_GET['valor2'];


$sql = "SELECT * FROM `alunos_disciplinas` WHERE `PeriodoLetivo`= '$idLetivo' and `idDiciplina` = '$idDisciplina'";
$query = $GLOBALS['con']->query($sql);

