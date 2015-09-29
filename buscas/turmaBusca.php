<?php
include('../config.php');

$valor = $_GET['valor'];

$sql = "select * from turma where idCurso = '$valor'";



$result = $con->query($sql);
while($Rresult = $result->fetch_array())
{
    ?>
    <option value="<?php echo $Rresult['idTurma']; ?>"><?php echo $Rresult['Nome']; ?></option>
<?php
}

