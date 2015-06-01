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
            Alterar cadastro de aluno
        </div>
        <div class="fourteen wide column">
            <div class="ui two column center aligned stackable divided grid">

                <div class="cadastroDisciplina column">
                    <p class="cadastroLabel">Nome</p>
                    <input class="inputDisciplina" type="text" id="nomeAluno" placeholder="Ralph">
                    <br><br>
                    <p class="cadastroLabel">Sobrenome</p>
                    <input class="inputDisciplina" type="text" id="nomeAluno" placeholder="Nogueira Silvério">
                    <br><br>
                    <p class="cadastroLabel">RA</p>
                    <input class="inputDisciplina" type="text" placeholder="127635">
                    <br><br>




                    <div class="ui two column center aligned stackable  grid">
                        <div class="cadastroDisciplina column">
                            <p class="cadastroLabel">Curso</p>
                            <label>
                                <div style="text-align: left">
                                    <select class="ui dropdown" name="modulo" style="width: 100%	">

                                        <option value="">Selecione curso</option>
                                        <i class="dropdown icon"></i>
                                        <?php
                                        for($i = 1;$i < 10;$i++){
                                            ?>
                                            <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                            </label>
                        </div>
                        <div class="cadastroDisciplina column">
                            <p class="cadastroLabel">Turma</p>
                            <label>
                                <div style="text-align: left">
                                    <select class="ui dropdown" name="modulo" style="width: 100%	">

                                        <option value="">Selecione Turma</option>
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
                <div class="cadastroDisciplina column ">


                    <p class="cadastroLabel">CPF</p>
                    <input class="inputDisciplina" type="text" placeholder="393939888-000">
                    <br><br>




                    <div class="ui two column center aligned stackable  grid">
                        <div class="cadastroDisciplina column">
                            <p class="cadastroLabel">Bolsa</p>
                            <div style="text-align: left">
                                <select class="ui dropdown" style="width: 100%">
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
                                <select class="ui dropdown" style="width: 100%">
                                    <option value="">Financiamento</option>
                                    <option value="Sim">Sim</option>
                                    <option value="Nao">Não</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>

                    <p class="cadastroLabel">Data Matrícula</p>
                    <input class="inputDisciplina" type="date" placeholder="dd/mm/aaaa">

                    <br><br>

                    <p class="cadastroLabel">Período Letivo</p>
                    <input class="inputDisciplina" type="text" placeholder="Período Letivo">
                    <br><br>
                    <br>
                    <a>
                        <input type="submit" class="ui green right labeled right chevron icon button" value="Alterar">
                    </a>
                </div>


            </div>


        </div>
    </div>
</div>

</body>
</html>
