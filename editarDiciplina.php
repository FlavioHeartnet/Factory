<?php
include("topo.php");
include("funcoes.php");

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">



<body id="home">

<?php

if(isset($_POST['id'])) {
    $nome = $_POST['nome'];
    $horas = $_POST['horas'];
    $sigla = $_POST['sigla'];
    $descricao = $_POST['descricao'];
    $id = $_POST['id'];
}
    ?>


    <div class="ui vertical feature segment">
        <div class="ui centered page grid">
            <div class="titlePage">
                Editar disciplina
            </div>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="fourteen wide column">
                <div class="ui two column center aligned stackable divided grid">

                    <div class="cadastroDisciplina column">
                        <p class="cadastroLabel">Nome da Disciplina</p>
                        <input class="inputDisciplina" value="<?php echo $nome ?>" name="nome" type="text"
                               placeholder="Nome">
                        <br><br>

                        <p class="cadastroLabel">Abrevitura</p>
                        <input class="inputDisciplina" value="<?php echo $sigla ?>" name="sigla" type="text"
                               placeholder="sigla">
                        <br><br>

                        <p class="cadastroLabel">Carga horaria</p>
                        <input class="inputDisciplina" value="<?php echo $horas ?>" type="text" name="horas"
                               placeholder="Carga horaria">
                        <input type="hidden" value="<?php echo $id ?>" name="id">
                        <br><br>
                        <br>


                    </div>
                    <div class="cadastroDisciplina column ">

                        <p class="cadastroLabel">Descrição</p>
                        <input class="inputDisciplina" value="<?php echo $descricao ?>" type="text" name="desc"
                               placeholder="Descricao">
                        <br><br>

                        <br>

                        <input type="submit" name="gravar" class="ui green right labeled icon button" value="Atualizar">

                        <i class="right chevron icon"></i>
                        <input type="submit" name="deletar" class="ui red right labeled icon button" value="Deletar">

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
    $id = $_POST['id'];

    editarDiciplina($id, $nomeDiciplina, $sigla, $cargaHora, $descricao);
}else if(isset($_POST['deletar']))
{

    $id = $_POST['id'];

    deleteDiciplina($id);

}
?>

</body>
</html>