<?php
<<<<<<< HEAD
include("topo.php");
include("funcoes.php");
=======

include("topo.php");
include("funcoes.php");

>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa
?>

<!DOCTYPE html>
<html>
<<<<<<< HEAD



<body id="home">


<form id="curso"  action="<?php echo $_SERVER['PHP_SELF']; ?>">
    <div class="ui vertical feature segment">
        <div class="ui centered page grid">
            <div class="titlePage">
                Cadastro de novo Curso
            </div>
            <div class="fourteen wide column">
                <div class="ui two column center aligned stackable divided grid">


                    <div class="cadastroDisciplina column">
                        <p class="cadastroLabel">Nome do Curso</p>
                        <input class="inputDisciplina" name="nome" type="text" id="NomeCurso" placeholder="Nome do Curso">
                        <br><br>
                        <p class="cadastroLabel">Código do MEC</p>
                        <input class="inputDisciplina" name="mec" type="text" id="CodMec" placeholder="Código do MEC">
                        <br><br>
                        <p class="cadastroLabel">Data de Autorização do MEC</p>
                        <input class="inputDisciplina" type="text" id="AutMec" name="horas" autocomplete="false" data-mask ="00/00/0000" placeholder="dd/mm/aaaa">
                        <br><br><br>
                    </div>
                    <div class="cadastroDisciplina column ">
                        <p class="cadastroLabel">Modulos</p>
                        <label>
                            <div style="text-align: left">
                                <select class="ui dropdown" name="modulo" style="width: 100%	">

                                    <option value="">Selecione a quantidade de modulos</option>
                                    <i class="dropdown icon"></i>
                                    <?php
                                    for($i = 1;$i < 10;$i++){
                                        ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </label>
                        <br>
                        <p class="cadastroLabel">Coordenador</p>
                        <input class="inputDisciplina" name="coordenador" type="text" placeholder="Coordenador">
                        <br><br>

                        <br>

                        <a id="botao" class="ui green right labeled icon button" value="Cadastrar">
                            Cadastrar
                            <i class="right chevron icon"></i>
                        </a>
                    </div>




                </div>


            </div>
        </div>
    </div>
</form>
<?php
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


<body id="home">


<form id="curso" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
<div class="ui vertical feature segment">
    <div class="ui centered page grid">
        <div class="titlePage">
            Cadastro de novo Curso
        </div>
        <div class="fourteen wide column">
            <div class="ui two column center aligned stackable divided grid">


                <div class="cadastroDisciplina column">
                    <p class="cadastroLabel">Nome do Curso</p>
                    <input class="inputDisciplina" name="nome" type="text" id="NomeCurso" placeholder="Nome do Curso">
                    <br><br>
                    <p class="cadastroLabel">Código do MEC</p>
                    <input class="inputDisciplina" name="mec" type="text" id="CodMec" placeholder="Código do MEC">
                    <br><br>
                    <p class="cadastroLabel">Data de Autorização do MEC</p>
                    <input class="inputDisciplina" type="text" id="AutMec" name="horas" autocomplete="false" data-mask ="00/00/0000" placeholder="dd/mm/aaaa">
                    <br><br><br>
                </div>
                <div class="cadastroDisciplina column ">
                    <p class="cadastroLabel">Modulos</p>
                    <label>
                        <div style="text-align: left">
                            <select class="ui dropdown" name="modulo" style="width: 100%	">

                                <option value="">Selecione a quantidade de modulos</option>
                                <i class="dropdown icon"></i>
                                <?php
                                for($i = 1;$i < 10;$i++){
                                    ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                                <?php } ?>
                            </select>
                        </div>
                    </label>
                    <br>
                    <p class="cadastroLabel">Coordenador</p>
                    <input class="inputDisciplina" name="coordenador" type="text" placeholder="Coordenador">
                    <br><br>

                    <br>

                    <a id="botao" class="ui green right labeled icon button" value="Cadastrar">
                        Cadastrar
                        <i class="right chevron icon"></i>
                    </a>
                </div>




            </div>


        </div>
    </div>
</div>
</form>
<?php

>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa
if(isset($_POST['nome']))
{
    $nome = $_POST['nome'];
    $mac = $_POST['mec'];
    $dataMac= $_POST['horas'];
    $modulo = $_POST['modulo'];
    $coordenador = $_POST['coordenador'];
<<<<<<< HEAD
    addCurso($nome, $mac, $dataMac, $modulo, $coordenador);
=======

    addCurso($nome, $mac, $dataMac, $modulo, $coordenador);

>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa
}
?>
<script type="text/javascript">
    $(document).ready(function(){
<<<<<<< HEAD
        $("#botao").click(function(){
            $("#curso").submit();
        })
    })
</script>
</body>
</html>
=======


        $("#botao").click(function(){

            $("#curso").submit();

        })








    })

</script>
</body>
</html>
>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa
