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

    <?php

    if(isset($_POST['idCurso']))
    {

        $idCurso = $_POST['idCurso'];

        $sql = "select * from cursos where idCurso = '$idCurso'";
        $query=$con->query($sql);
        $busca= $query->fetch_array();

    }

    ?>
    <div class="ui vertical feature segment">
        <div class="ui centered page grid">

            <div class="titlePage">
                Alterar Curso
            </div>

            <div class="fourteen wide column">
                <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="ui two column center aligned stackable divided grid">

                    <div class="cadastroDisciplina column">
                        <p class="cadastroLabel">Nome do Curso</p>
                        <input class="inputDisciplina" type="text" id="NomeCurso" name="nome" placeholder="Nome do Curso" value="<?php echo $busca['Nome'] ?>">
                        <br><br>
                        <p class="cadastroLabel">Código do Curso</p>
                        <input class="inputDisciplina" type="text" id="CodCurso" name="codCurso" placeholder="Ex: 012012ADM" value="<?php echo $busca['idCurso'] ?>">
                        <br><br>
                        <p class="cadastroLabel">Código do MEC</p>
                        <input class="inputDisciplina" type="text" id="CodMec" name="codMac" placeholder="Código do MEC" value="<?php echo $busca['codMac'] ?>">
                        <br><br>

                        <br><br><br>
                    </div>
                    <div class="cadastroDisciplina column ">
                        <p class="cadastroLabel">Modulos</p>
                        <label>
                            <div style="text-align: left">
                                <select class="ui dropdown" name="modulo" style="width: 100%	">

                                    <option value="<?php echo $busca['Modulo'] ?>"><?php echo $busca['Modulo'] ?></option>
                                    <i class="dropdown icon"></i>
                                    <?php
                                    $modulo = $busca['Modulo'];
                                    for($i = 1;$i <= $modulo;$i++){
                                        ?>
                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>

                                    <?php } ?>
                                </select>
                            </div>
                        </label>
                        <br>
                        <p class="cadastroLabel">Data de Autorização do MEC</p>
                        <input class="inputDisciplina" type="text" id="AutMec" name="dataAutoMac" placeholder="dd/mm/aaaa" value="<?php echo $busca['dataAutoMac'] ?>">
                        <br><br>
                        <p class="cadastroLabel">Coordenador</p>
                        <label>
                            <input class="inputDisciplina" type="text" name="coordenador"
                                   value="<?php echo $busca['Cordenador'] ?>">
                        </label>
                        <br><br>
                        <p class="cadastroLabel">Duração</p>
                        <?php

                        if($modulo == 8) {

                        $texto = "4 anos";
                        }else if($modulo == 4)
                        {
                            $texto =  "2 anos";

                        }else if($modulo == 10 or $modulo == 9)
                        {
                            $texto =  "5 anos";
                        }else if($modulo == 0){

                            $texto =  "não ha modulos para este curso";
                        }


                        ?>



                        <input class="inputDisciplina" type="text" id="duracao" placeholder="Duração" value="<?php echo $texto ?>">
                        <br><br>



                        <br>
                    </div>


                </div>
                <br>

                <?php

                $sql = "select * from modulo m inner join diciplinas d on d.idDiciplina = m.idDiciplina where m.idCurso = '$idCurso'";

                $query = $con->query($sql);

                $rsBuscaModulo = $query->fetch_array();
                ?>
                <div class="ui left TituloModulos">Disciplinas</div>
                <hr><br>
                <div class="ui left Modulos"><?php echo $rsBuscaModulo['semestre']?>º Módulo </div>
                <table class="ui red table">
                    <thead>
                    <tr>
                        <th>Abreviação</th>
                        <th>Nome</th>
                        <th>Carga horária (em horas)</th>
                        <th>Pre-requisito</th>
                        <th></th>
                    </tr>
                    </thead>
                    <?php
                    while($rsBuscaModulo = $query->fetch_array()){

                    ?>

                    <tbody>
                    <tr>
                        <td>
                            <label>
                                <input class="inputDisciplina" name="sigla[]" type="text"
                                       value="<?php echo $rsBuscaModulo['sigla'];?>">
                            </label>
                            <input type="hidden" name="idDiciplina[]" value="<?php echo $rsBuscaModulo['idDiciplina'];?>">
                            <input type="hidden" name="idCurso" value="<?php echo $rsBuscaModulo['idCurso'];?>">
                        </td>
                        <td><label>
                                <input type="text" name="nomedis[]" value="<?php echo $rsBuscaModulo['Nome']; ?>"
                                       class="inputDisciplina">
                            </label></td>
                        <td><label>
                                <input type="text" name="carga[]" value="<?php echo $rsBuscaModulo['cargaHoraria']; ?>"
                                       class="inputDisciplina ">
                            </label></td>
                        <td><label>
                                <select class="ui dropdown" name="requisito[]">
                                    <option value="0">Sem pre-requisito</option>
                                    <?php
                                    $sql = "select * from modulo m INNER JOIN diciplinas d on m.idDiciplina = d.idDiciplina where m.idCurso = '$idCurso'";
                                    $result=$con->query($sql);
                                    while($rsResult = $result->fetch_array())
                                    {
                                        ?>
                                        <option value="<?php echo $rsResult['idDiciplina'] ?>"><?php echo $rsResult['Nome'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                            </label></td>
                        <td> <a href="alterarDisciplina.php"><i class="write icon"></i> Editar</a></td>
                    </tr>



                    </tbody>
                    <?php } ?>
                    <tfoot>
                    <tr><th><b>Carga horária total: </b></th>
                        <th></th>
                        <th>130 horas</th>
                        <th></th>
                    </tr></tfoot>
                </table>

                <br>

                <input class="ui gray right labeled icon button" name="salvar" value="Salvar" type="submit">
                      <i class="right chevron icon"></i>



                <hr><br>
            </form>
            </div>


        </div>

    </div>

    <?php
        if(isset($_POST['salvar']))
        {
            $idCurso = $_POST['idCurso'];
            $nome = $_POST['nome'];
            $mac = $_POST['codMac'];
            $dataMac = $_POST['dataAutoMac'];
            $coordenador = $_POST['coordenador'];
            $idDisciplina = $_POST['idDiciplina'];
            $nomeDis = $_POST['nomedis'];
            $sigla = $_POST['sigla'];
            $cargahoraria = $_POST['carga'];
            $requisito = $_POST['requisito'];

            editarCurso($idCurso,$nome, $mac, $dataMac, $modulo, $coordenador, $idDisciplina, $nomeDis, $sigla, $cargahoraria, $requisito);

        }


    ?>
    </body>
    </html>
