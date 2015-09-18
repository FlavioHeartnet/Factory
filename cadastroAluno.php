<?php
include("topo.php");
include("funcoes.php");

?>

<!DOCTYPE html>
<html>
<<<<<<< HEAD

=======
<head>
    <title> Course Factory SYS - Admin </title>

    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/semantic.css">
    <link rel="stylesheet" type="text/css" href="css/homepage.css">


    <script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.js"></script>
    <script src="js/semantic.js"></script>
    <script src="js/homepage.js"></script>




</head>
>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa


<body id="home">


<div class="ui vertical feature segment">
    <div class="ui centered page grid">
        <div class="titlePage">
            Cadastro de novo aluno
        </div>
<<<<<<< HEAD
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
=======
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>">
>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa
        <div class="fourteen wide column">
            <div class="ui two column center aligned stackable divided grid">

                <div class="cadastroDisciplina column">
                    <p class="cadastroLabel">Nome</p>
<<<<<<< HEAD
                    <input required class="inputDisciplina" type="text" id="nomeAluno" name="nome" placeholder="digite seu nome">
                    <br><br>
                    <p class="cadastroLabel">Sobrenome</p>
                    <input required class="inputDisciplina" type="text" id="nomeAluno" name="sobrenome" placeholder="Nogueira Silvério">
                    <br><br>
                    <p class="cadastroLabel">RA</p>
                    <input required class="inputDisciplina" type="text" name="RA" placeholder="Ex. 123485">
=======
                    <input class="inputDisciplina" type="text" id="nomeAluno" name="nome" placeholder="digite seu nome">
                    <br><br>
                    <p class="cadastroLabel">Sobrenome</p>
                    <input class="inputDisciplina" type="text" id="nomeAluno" name="sobrenome" placeholder="Nogueira Silvério">
                    <br><br>
                    <p class="cadastroLabel">RA</p>
                    <input class="inputDisciplina" type="text" name="RA" placeholder="Ex. 123485">
>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa
                    <br><br>




                    <div class="ui two column center aligned stackable  grid">
                        <div class="cadastroDisciplina column">
                            <p class="cadastroLabel">Curso</p>
<<<<<<< HEAD
                            <div style="text-align: left">
                            <label>

                                    <select required class="ui dropdown" name="modulo" style="width: 100%	">
=======
                            <label>
                                <div style="text-align: left">
                                    <select class="ui dropdown" name="modulo" style="width: 100%	">
>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa

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
<<<<<<< HEAD

                            </label>
                            </div>
=======
                                </div>
                            </label>
>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa
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
<<<<<<< HEAD
                                <select required class="ui dropdown" name="bolsa" style="width: 100%">
=======
                                <select class="ui dropdown" name="bolsa" style="width: 100%">
>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa
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
<<<<<<< HEAD
                                <select required class="ui dropdown" name="finaciado" style="width: 100%">
=======
                                <select class="ui dropdown" name="finaciado" style="width: 100%">
>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa
                                    <option value="">Financiamento</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>

                    <p class="cadastroLabel">Data Matrícula</p>
<<<<<<< HEAD
                    <input required class="inputDisciplina" type="date" name="data" placeholder="dd/mm/aaaa">

                    <br><br>


=======
                    <input class="inputDisciplina" type="date" name="data" placeholder="dd/mm/aaaa">

                    <br><br>

                    <p class="cadastroLabel">Período Letivo</p>
                    <input class="inputDisciplina" name="periodo" type="text" placeholder="Período Letivo">
                    <br><br>
                    <br>
>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa
                    <a>
                        <input type="submit" name="cadastro" class="ui green right labeled icon button" value="Cadastrar">

                        <i class="right chevron icon"></i>
                    </a>
                </div>


            </div>
<<<<<<< HEAD


        </div>
        </form>
=======
            </form>

        </div>
>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa

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
<<<<<<< HEAD
    $financiado = $_POST['finaciado'];
    $dataMatricula = $_POST['data'];
    $RA = $_POST['RA'];

    cadastraAluno($nome, $sobrenome, $idCurso, $RA, $cpf, $bolsa, $financiado, $dataMatricula);
=======
    $financiado = $_POST['financiado'];
    $dataMatricula = $_POST['data'];
    $periodoLetivo = $_POST['periodo'];
    $RA = $_POST['nome'];

    cadastraAluno($nome, $sobrenome, $idCurso, $idTurma, $endereco, $telefone, $celular, $RA, $cpf, $RG, $bolsa, $financiado, $dataMatricula, $periodoLetivo);
>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa
}
?>

</body>
<<<<<<< HEAD
</html>
=======
</html>
>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa
