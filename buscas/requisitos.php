
<?php

include('../config.php');

$valor = $_GET['valor'];
$idCurso = $_GET['valor2'];

$sql= $con->query("select * from modulo where idDiciplina = '$valor' and idCurso = '$idCurso'");

while($rs = $sql->fetch_array())
{
    $requisito = $rs['prerequisito'];
    $query = $con->query("select * from diciplinas where idDiciplina = '$requisito'");
    $rsQuery = $query->fetch_array();

    if($rs['prerequisito'] == 0 or $rs['prerequisito'] == "") {
        ?>

        <p>Sem Pre-Requisitos</p>
        <input type="hidden" value="0" name="requisito[]">

    <?php
    }else
    {
        ?>

        <p><?php echo utf8_encode($rsQuery['Nome']); ?></p>
        <input type="hidden" value="<?php echo $rsQuery['idDiciplina'] ?>" name="requisito[]">
    <?php
    }

}