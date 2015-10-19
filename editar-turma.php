<?php
include("topo.php");


if(isset($_POST['gravar']))
{
    $nome = $_POST['nome'];
    $idCurso = $_POST['curso'];
    $numAlunos = $_POST['numAluno'];
    $idTurma = $_POST['idTurma'];

    editarTurma($nome, $idCurso, $idTurma, $numAlunos);

}elseif(isset($_POST['deletar']))
{

    $idTurma = $_POST['idTurma'];
    deletarTurma($idTurma);

}

if(isset($_POST['idTurma']))
{

    $idTurma = $_POST['idTurma'];
    $sql = "select * from turma where idTurma = '$idTurma'";
    $query = $GLOBALS['con']->query($sql);

}else{

    echo "<script>alert('Você acessou a pagina de forma incorreta, você será redirecionado!'); location.href='home.php'</script>";
    //header("Location: home.php");

}

?>
<html>
<body id="home">

<?php

while($buscaTurma = $query->fetch_array()){

    $idTurma = $buscaTurma['idTurma'];
?>
<div class="ui vertical feature segment">
    <div class="ui centered page grid">
        <div class="titlePage">
            Cadastro de nova turma
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
            <div class="fourteen wide column">
                <div class="ui two column center aligned stackable divided grid">

                    <div class="cadastroDisciplina column">
                        <p class="cadastroLabel">Nome da Turma</p>
                        <input type="hidden" name="idTurma" value="<?php echo $idTurma ?>">
                        <input class="inputDisciplina" name="nome" type="text" value="<?php echo $buscaTurma['Nome'] ?>" placeholder="Nome da Turma">
                        <br><br>

                        <div class="cadastroDisciplina column">
                            <div class="cadastroDisciplina column">
                                <p class="cadastroLabel">Curso</p>
                                <label>
                                    <div style="text-align: left">
                                        <select class="ui dropdown" name="curso" style="width: 100%	">

                                            <?php   $curso = $buscaTurma['idCurso'];
                                            $query = $con->query("select * from cursos where idCurso = '$curso'");

                                            $rsQuery = $query->fetch_array();
                                            ?>

                                            <option value="<?php echo $buscaTurma['idCurso'] ?>"><?php echo $rsQuery['Nome'] ?></option>
                                            <i class="dropdown icon"></i>
                                            <?php


                                            $query = $con->query("select * from cursos");
                                            while($rsQuery = $query->fetch_array()){
                                                ?>
                                                <option value="<?php echo $rsQuery['idCurso']; ?>"><?php echo utf8_encode($rsQuery['Nome']); ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </label>
                            </div>




                        </div>
                        <br>


                    </div>
                    <div class="cadastroDisciplina column">
                        <p class="cadastroLabel">Numero de alunos</p>

                        <div style="text-align: left">
                            <input type="number" autocomplete="off" value="<?php echo $buscaTurma['numAlunos'];  ?>" data-mask = "0000" class="inputDisciplina" name="numAluno">
                        </div>

                        <br><br>

                    </div>
                </div>

                <br>
                <div class="cadastroDisciplina column ">


                    <input type="submit" name="gravar" class="ui green right labeled icon button" value="Atualizar">

                    <i class="right chevron icon"></i>
                    <input type="submit" name="deletar" class="ui red right labeled icon button" value="Deletar">

                </div>

            </div>
        </form>
    </div>
</div>

<?php } ?>


<?php



?>
</body>
</html>
