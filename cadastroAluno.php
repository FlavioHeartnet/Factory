<?php
include("topo.php");


?>

<!DOCTYPE html>
<html>



<body id="home">


<div class="ui vertical feature segment">
    <div class="ui centered page grid">
        <div class="titlePage">
            Cadastro de novo aluno
        </div>
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <div class="fourteen wide column">
            <div class="ui two column center aligned stackable divided grid">

                <div class="cadastroDisciplina column">
                    <p class="cadastroLabel">Nome</p>
                    <input required class="inputDisciplina" type="text" id="nomeAluno" name="nome" placeholder="digite seu nome">
                    <br><br>
                    <p class="cadastroLabel">Sobrenome</p>
                    <input required class="inputDisciplina" type="text" id="nomeAluno" name="sobrenome" placeholder="Nogueira Silvério">
                    <br><br>
                    <p class="cadastroLabel">RA</p>
                    <input required class="inputDisciplina" type="text" name="RA" placeholder="Ex. 123485">
                    <br><br>




                    <div class="ui two column center aligned stackable  grid">
                        <div class="cadastroDisciplina column">
                            <p class="cadastroLabel">Curso</p>
                            <div style="text-align: left">
                            <label>

                                    <select required class="ui dropdown" name="modulo" style="width: 100%	">

                                        <option value="">Selecione curso</option>
                                        <i class="dropdown icon"></i>
                                        <?php

                                        $sql = "select * from cursos WHERE 1";
                                        $query= $con->query($sql);

                                        while($rsCurso = $query->fetch_array()){
                                            ?>
                                            <option value="<?php echo $rsCurso['idCurso']; ?>"><?php echo $rsCurso['Nome']; ?></option>

                                        <?php } ?>
                                    </select>

                            </label>
                            </div>
                        </div>

                    </div>
                    <br>


                </div>
                <div class="cadastroDisciplina column ">


                    <p class="cadastroLabel">CPF</p>
                    <input class="inputDisciplina" name="cpf" type="text" placeholder="393939888-000">
                    <br><br>




                    <div class="ui two column center aligned stackable  grid">
                        <div class="cadastroDisciplina column">
                            <p class="cadastroLabel">Bolsa</p>
                            <div style="text-align: left">
                                <select required class="ui dropdown" name="bolsa" style="width: 100%">
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
                                <select required class="ui dropdown" name="finaciado" style="width: 100%">
                                    <option value="">Financiamento</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>

                    <p class="cadastroLabel">Data Matrícula</p>
                    <input required class="inputDisciplina" type="date" name="data" placeholder="dd/mm/aaaa">

                    <br><br>


                    <a>
                        <input type="submit" name="cadastro" class="ui green right labeled icon button" value="Cadastrar">

                        <i class="right chevron icon"></i>
                    </a>
                </div>


            </div>


        </div>
        </form>

    </div>
</div>

<?php

if(isset($_POST['cadastro']))
{
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $idCurso = $_POST['modulo'];
    $cpf = $_POST['cpf'];
    $bolsa = $_POST['bolsa'];
    $financiado = $_POST['finaciado'];
    $dataMatricula = $_POST['data'];
    $RA = $_POST['RA'];

    cadastraAluno($nome, $sobrenome, $idCurso, $RA, $cpf, $bolsa, $financiado, $dataMatricula);
}
?>

</body>
</html>