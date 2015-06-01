<?php
include("topo.php");
include("funcoes.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title> Course Factory SYS - Admin </title>

    <meta charset="UTF-8">
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
            Cadastro de nova turma
        </div>
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
                                            <option value="<?php echo $rsQuery['idCurso']; ?>"><?php echo $rsQuery['Nome']; ?></option>

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
                                        for($i = 1;$i < 10;$i++){
                                            ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </label>
                            <br><br>

                        </div>
                    </div>
                    <br>


                </div>
            </div>
<form action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <table class="ui compact celled definition table">
                <thead>
                <tr>
                    <th>Turma</th>
                    <th>Nome Completo</th>
                    <th>CPF</th>
                    <th>RA</th>
                </tr>
                </thead>
                <tbody>

                <?php

                $query = $con->query("select * from aluno");
                $i = 1;
                while($rsQuery = $query->fetch_array()) {

                    ?>
                    <tr>
                        <td class="collapsing">
                            <div class="ui fitted checkbox">
                                <input type="checkbox" id="aluno<?php echo $i ?>"> <label for="aluno<?php echo $i ?>"></label>
                            </div>
                        </td>
                        <td><?php echo $rsQuery['Nome']; ?></td>
                        <td><?php echo $rsQuery['CPF']; ?></td>
                        <td><?php echo $rsQuery['RA']; ?></td>
                        <input type="hidden" value="<?php echo $rsQuery['idAluno']; ?>" name="idAluno">
                    </tr>

                <?php
                    $i=$i+1;
                }
                ?>

                </tbody>
            </table>
            <br>
            <input type="submit" class="ui green right labeled icon button" value="Cadastrar">
            </form>
        </div>
    </div>

    <?php



    addTurma($nome, $idCurso, $idAluno, $periodo);
    ?>

</body>
</html>
