<?php
include("topo.php");
include("funcoes.php");
?>
<!DOCTYPE html>
<html>



<body id="home">

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
                    <input class="inputDisciplina" name="nome" type="text" id="nomeAluno" placeholder="Nome da Turma">
                    <br><br>

                    <div class="ui two column center aligned stackable  grid">
                        <div class="cadastroDisciplina column">
                            <p class="cadastroLabel">Curso</p>
                            <label>
                                <div style="text-align: left">
                                    <select class="ui dropdown" name="curso" style="width: 100%	">

                                        <option value="">Selecione curso</option>
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
                        <div class="cadastroDisciplina column">
                            <p class="cadastroLabel">Período Letivo</p>
                            <label>
                                <div style="text-align: left">
                                    <select class="ui dropdown" name="periodo" style="width: 100%">

                                        <option value="">Selecione Letivo</option>
                                        <i class="dropdown icon"></i>
                                        <?php

                                        $sql = "select * from periodoletivo";
                                        $query = $con->query($sql);

                                        while($result = $query->fetch_array()){
                                            ?>
                                            <option value="<?php echo $result['idLetivo']; ?>"><?php echo $result['Nome']; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </label>
                            <br><br>

                        </div>

                        <div class="cadastroDisciplina column">
                            <p class="cadastroLabel">Numero de alunos</p>
                            <label>
                                <div style="text-align: left">
                                    <input type="number" autocomplete="off" data-mask = "0000" class="inputDisciplina" name="numAluno">
                                </div>
                            </label>
                            <br><br>

                        </div>

                    </div>
                    <br>


                </div>
            </div>

            <br>
            <input type="submit" name="turma" class="ui green right labeled icon button" value="Cadastrar">

        </div>
        </form>
    </div>
    </div>


    <?php

if(isset($_POST['turma']))
{
    $nome = $_POST['nome'];
    $idCurso = $_POST['curso'];
    $periodo = $_POST['periodo'];
    $numAlunos = $_POST['numAluno'];

    addTurma($nome, $idCurso, $periodo, $numAlunos);
}
    ?>

</body>
</html>
