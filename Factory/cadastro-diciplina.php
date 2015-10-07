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
            Cadastro de nova disciplina
        </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"
        <div class="fourteen wide column">
            <div class="ui two column center aligned stackable divided grid">

                <div class="cadastroDisciplina column">
                    <p class="cadastroLabel">Nome da Disciplina</p>
                    <input class="inputDisciplina" name="nome" type="text" placeholder="Nome">
                    <br><br>
                    <p class="cadastroLabel">Abrevitura</p>
                    <input class="inputDisciplina" name="sigla" type="text" placeholder="sigla">
                    <br><br>
                    <p class="cadastroLabel">Carga horaria</p>
                    <input class="inputDisciplina" type="text" name="horas" placeholder="Carga horaria">
                    <br><br>
                    <br>


                </div>
                <div class="cadastroDisciplina column ">


                    <p class="cadastroLabel">Descricao</p>
                    <input class="inputDisciplina" type="text" name="desc" placeholder="Descricao">
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
    $nomeDiciplina = $_POST['nome'];
    $sigla = $_POST['sigla'];
    $cargaHora = $_POST['horas'];
    $preRequisito  = $_POST['requisito'];
    $descricao = $_POST['desc'];
    echo "<script>alert($descricao)</script>";
    addDiciplina($nomeDiciplina, $sigla, $cargaHora, $preRequisito, $descricao);
}
?>

</body>
</html>