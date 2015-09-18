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
            Cadastro de Periodo Letivo
        </div>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="fourteen wide column">
            <div class="ui two column center aligned stackable divided grid">

                <div class="cadastroDisciplina column">
                    <p class="cadastroLabel">Nome do Periodo Letivo</p>
                    <input class="inputDisciplina" name="nome" type="text" placeholder="Nome">
                    <br><br>
                    <p class="cadastroLabel">Inicio</p>
                    <input class="inputDisciplina" name="inicio" value="" type="date" placeholder="dd/mm/aaaa">
                    <br><br>
                    <p class="cadastroLabel">Termino</p>
                    <input class="inputDisciplina" name="fim" value="" type="date" placeholder="dd/mm/aaaa">
                    <br><br>
                    <br>


                </div>

                    <input type="submit" name="gravar" class="ui green right labeled icon button" value="Cadastrar">

                    <i class="right chevron icon"></i>

                </div>


            </div>

        </form>
        </div>

    </div>


<?php

if(isset($_POST['gravar']))
{

    $nome = $_POST['nome'];
    $inicio = $_POST['inicio'];
    $termino = $_POST['fim'];
    addLetivo($nome, $inicio, $termino);


}

?>
</body>
</html>