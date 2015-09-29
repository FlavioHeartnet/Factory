<?php

include("topo.php");


if(isset($_POST['idAluno'])){

    $idAluno = $_POST['idAluno'];

    $sql = $con->query("SELECT * FROM aluno WHERE idAluno = '$idAluno'");

        $alunos = $sql->fetch_array();


}

?>

<!DOCTYPE html>
<html>



<body id="home">
<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="ui vertical feature segment">
    <div class="ui centered page grid">
        <div class="titlePage">
            Alterar cadastro de aluno
        </div>
        <div class="fourteen wide column">
            <div class="ui two column center aligned stackable divided grid">

                <div class="cadastroDisciplina column">
                    <p class="cadastroLabel">Nome</p>
                    <input class="inputDisciplina" name="nome" type="text" value="<?php echo $alunos['nome'] ?>" id="nomeAluno" placeholder="Ralph">
                    <br><br>
                    <p class="cadastroLabel">Sobrenome</p>
                    <input class="inputDisciplina" name="sobrenome" type="text" value="<?php echo $alunos['sobrenome'] ?>" id="nomeAluno" placeholder="Nogueira Silvério">
                    <br><br>
                    <p class="cadastroLabel">RA</p>
                    <input class="inputDisciplina" name="ra"  value="<?php echo $alunos['RA'] ?>" type="text" placeholder="127635">
                    <br><br>
                    <p class="cadastroLabel">Endereço</p>
                    <input class="inputDisciplina" name="endereco"  value="<?php echo $alunos['endereco'] ?>" type="text" placeholder="digite o endereço">
                    <br><br>
                    <p class="cadastroLabel">Telefone</p>
                    <input class="inputDisciplina" name="telefone"  value="<?php echo $alunos['telefone'] ?>" type="text" placeholder="digite o Telefone">
                    <br><br>
                    <p class="cadastroLabel">Celular</p>
                    <input class="inputDisciplina" name="celular"  value="<?php echo $alunos['celular'] ?>" type="text" placeholder="digite o Celular">
                    <br><br>



                </div>
                <div class="cadastroDisciplina column ">


                    <p class="cadastroLabel">CPF</p>
                    <input class="inputDisciplina" name="cpf" value="<?php echo $alunos['CPF']; ?>" type="text" placeholder="393939888-000">
                    <br><br>

                    <p class="cadastroLabel">RG</p>
                    <input class="inputDisciplina" name="rg"  value="<?php echo $alunos['RG'] ?>" type="text" placeholder="digite o RG">
                    <br><br>


                    <div class="ui two column center aligned stackable  grid">
                        <div class="cadastroDisciplina column">
                            <p class="cadastroLabel">Bolsa</p>
                            <div style="text-align: left">
                                <select name="bolsa" class="ui dropdown" style="width: 100%">
                                    <option  value="<?php echo $alunos['bolsa']; ?>"><?php echo $alunos['bolsa']; ?></option>
                                    <option value="">Bolsa</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                            </div>
                        </div>
                        <div class="cadastroDisciplina column">
                            <p class="cadastroLabel">Financiado</p>
                            <div style="text-align: left">
                                <select name="financiado" class="ui dropdown" style="width: 100%">
                                    <option  value="<?php echo $alunos['Financiado']; ?>"><?php echo $alunos['Financiado']; ?></option>
                                    <option value="">Financiamento</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>


                    <div class="ui two column center aligned stackable  grid">
                        <div class="cadastroDisciplina column">
                            <p class="cadastroLabel">Curso</p>

                                <div style="text-align: left">
                                    <label>
                                    <select class="ui dropdown" onchange="buscaTurma(this.value)" name="curso" style="width: 100%	">

                                        <i class="dropdown icon"></i>
                                        <?php

                                        $sql = $con->query("select a.idCurso, c.Nome from aluno a inner join cursos c on c.idCurso = a.idCurso where a.idAluno = '$idAluno'");
                                        $result = $sql->fetch_array();
                                        ?>
                                        <option value="<?php echo $result['idCurso']; ?>"><?php echo utf8_encode($result['Nome']); ?></option>

                                        <?php

                                        $sql = $con->query("select * from cursos");
                                        while($result = $sql->fetch_array()){
                                            ?>

                                            <option value="<?php echo $result['idCurso']; ?>"><?php echo utf8_encode($result['Nome']); ?></option>

                                        <?php } ?>
                                    </select>
                            </label>
                                </div>

                        </div>
                        <div class="cadastroDisciplina column">
                            <p class="cadastroLabel">Turma</p>
                            <label>
                                <div style="text-align: left">
                                    <select id="turma" class="ui dropdown" name="turma" style="width: 100%	">

                                        <?php
                                        $turma = $alunos['idTurma'];
                                        $sql2 = $con->query("select * from turma where idTurma = '$turma'");
                                        $resultado = $sql2->fetch_array();?>

                                        <option  value="<?php echo $alunos['idTurma']; ?>"><?php echo $resultado['Nome']  ?></option>


                                    </select>
                                </div>
                            </label>
                            <br><br>

                        </div>
                    </div>
                    <br>


                    <p class="cadastroLabel">Data Matrícula</p>
                    <input class="inputDisciplina" name="dataMatricula" value="<?php echo date('Y-m-d',  strtotime($alunos['DataMatricula'])); ?>" type="date" placeholder="dd/mm/aaaa">

                    <br><br>


                    <a>
                        <input type="hidden" name="idAluno" value="<?php echo $alunos['idAluno'] ?>">
                        <input type="submit" name="alterarAluno" class="ui green right labeled right chevron icon button" value="Alterar">
                    </a>
                </div>


            </div>


        </div>
    </div>
</div>
</form>

<?php

if(isset($_POST['alterarAluno']))
{
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $idCurso = $_POST['curso'];
    $idTurma = $_POST['turma'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $celular = $_POST['celular'];
    $RA = $_POST['ra'];
    $cpf = $_POST['cpf'];
    $RG=$_POST['rg'];
    $bolsa = $_POST['bolsa'];
    $financiado = $_POST['financiado'];
    $dataMatricula = $_POST['dataMatricula'];
    $idAluno = $_POST['idAluno'];


    EditarAluno($nome, $sobrenome, $idCurso, $idTurma, $endereco, $telefone, $celular, $RA, $cpf, $RG, $bolsa, $financiado, $dataMatricula, $idAluno);

}

?>

<script type="text/javascript">
    var req;
    function buscaTurma(valor) {

// Verificando Browser
        if(window.XMLHttpRequest) {
            req = new XMLHttpRequest();
        }
        else if(window.ActiveXObject) {
            req = new ActiveXObject("Microsoft.XMLHTTP");
        }

// Arquivo PHP juntamente com o valor digitado no campo (método GET)
        var url = "buscas/turmaBusca.php?valor="+valor;

// Chamada do método open para processar a requisição
        req.open("get", url, true);

// Quando o objeto recebe o retorno, chamamos a seguinte função;
        req.onreadystatechange = function() {

            // Exibe a mensagem "Buscando Noticias..." enquanto carrega
            if(req.readyState == 1) {
                document.getElementById('turma').innerHTML = 'Buscando turmas...';
            }

            // Verifica se o Ajax realizou todas as operações corretamente
            if(req.readyState == 4 && req.status == 200) {

                // Resposta retornada pelo busca.php
                var resposta2 = req.responseText;



                // Abaixo colocamos a(s) resposta(s) na div resultado
                document.getElementById('turma').innerHTML = resposta2;
            }
        }
        req.send(null);
    }


</script>
</body>
</html>