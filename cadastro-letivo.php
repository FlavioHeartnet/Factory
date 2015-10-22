<?php
include("topo.php");

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
        <div class="sixteen wide column">
            <div class="ui one column center aligned stackable divided grid">

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
                    <p class="cadastroLabel">Periodo Letivo Anterior</p>
                    <select required="" class="ui dropdown" name="modulo">
                        <option value="0">Nenhum</option>
                        <?php $sql2 = $con->query("select * from periodoletivo where 1");

                        while($quey3 = $sql2->fetch_array()){
                            ?>
                            <option value="<?php echo $quey3['idLetivo']; ?>"><?php echo $quey3['Nome']; ?></option>

                        <?php } ?>
                    </select>
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
    $proximo = $_POST['modulo'];
    addLetivo($nome, $inicio, $termino, $proximo);


}

?>
</body>
</html>