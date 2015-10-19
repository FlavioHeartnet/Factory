<?php
include("topo.php");
include("funcoes.php");

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <title> Course Factory SYS - Admin </title>

    <link rel="stylesheet" type="text/css" href="css/semantic.css">
    <link rel="stylesheet" type="text/css" href="css/homepage.css">


    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
    <script src="js/semantic.js"></script>
    <script src="js/homepage.js"></script>


</head>


<body id="home">


<div class="ui vertical feature segment">
    <div class="ui centered page grid">
        <div class="titlePage">
            Cadastro de novo Curso
        </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
        <div class="fourteen wide column">
            <div class="ui two column center aligned stackable divided grid">

                <div class="cadastroDisciplina column">
                    <p class="cadastroLabel">Nome do Curso</p>
                    <input class="inputDisciplina" name="nome" type="text" placeholder="Nome">
                    <br><br>
                    <p class="cadastroLabel">Codigo do Mec</p>
                    <input class="inputDisciplina" name="mac" type="text" placeholder="Codigo do Mec">
                    <br><br>
                    <p class="cadastroLabel">Data de autorização do Mec</p>
                    <input class="inputDisciplina" type="text" name="horas" placeholder="Data Autorização">
                    <br><br>


                    <br>


                </div>
                <div class="cadastroDisciplina column">
                    <p class="cadastroLabel">Modulos</p>
                    <label>
                        <select class="dropdown" name="modulo">

                            <option value="0">Selecione a quantidade de modulos</option>
                            <?php
                        for($i = 1;$i < 10;$i++){
                        ?>
                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                            <?php } ?>
                        </select>
                    </label>

                    <br><br>
                    <p class="cadastroLabel">Coordenador</p>
                    <input class="inputDisciplina" type="text" name="coordenador" placeholder="Coordenador">
                    <br><br>
                    <br>

                    <input type="submit" name="gravar" class="ui green right labeled icon button" value="Cadastrar">

                    <i class="right chevron icon"></i>
                    </a>
                </div>


            </div>


        </div>
        </form>
    </div>
</div>

<?php

if(isset($_POST['gravar']))
{
    $nome = $_POST['nome'];
    $mac = $_POST['mac'];
    $dataMac= $_POST['horas'];
    $modulo = $_POST['modulo'];
    $coordenador = $_POST['coordenador'];

    addCurso($nome, $mac, $dataMac, $modulo, $coordenador);

}


?>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
