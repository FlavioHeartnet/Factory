<?php
include("topo.php");


?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">



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
                    <p class="cadastroLabel">Tipo da materia</p>
                    <label>
                        <select name="tipo" class="ui dropdown">
                            <option value="1">Ímpar</option>
                            <option value="2">Par</option>

                        </select>
                    </label>
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
    $descricao = $_POST['desc'];
    $tipo = $_POST['tipo'];

    addDiciplina($nomeDiciplina, $sigla, $cargaHora, $descricao, $tipo);
}
?>

</body>
</html>