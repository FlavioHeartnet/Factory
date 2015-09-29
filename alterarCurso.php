<?php
include("topo.php");

?>
    <!DOCTYPE html>
    <html>



    <body id="home">

    <?php

    if(isset($_POST['idCurso']))
    {

        $idCurso = $_POST['idCurso'];

        $sql = "select * from cursos where idCurso = '$idCurso'";
        $query=$con->query($sql);
        $busca= $query->fetch_array();
        $modulo = $busca['Modulo'];

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
                        <input class="inputDisciplina" type="text" id="NomeCurso" name="nome" placeholder="Nome do Curso" value="<?php echo utf8_encode($busca['Nome']) ?>">
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

                $sql = "select * from modulo m inner join diciplinas d on d.idDiciplina = m.idDiciplina where m.idCurso = '$idCurso' ORDER BY semestre";



               for($i=1; $i<=$modulo;$i++){
                ?>
                <div class="ui left TituloModulos">Disciplinas</div>
                <hr><br>
                <div class="ui left Modulos"><?php echo $i?>º Módulo </div>
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

                    $query = $con->query($sql);
                    while($rsBuscaModulo = $query->fetch_array()){

                    $semestre = $rsBuscaModulo['semestre'];

                        if($semestre == $i){



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
                            <input type="hidden" name="idModulo[]" value="<?php echo $rsBuscaModulo['idModulo'];?>">
                        </td>
                        <td><label>
                                <select class="ui dropdown" name="disciplina[]">

                                    <option value="<?php echo $rsBuscaModulo['idDiciplina'];?>"><?php echo utf8_encode($rsBuscaModulo['Nome']);  ?></option>
                                    <?php

                                    $query1 = $con->query("select * from modulo m inner join diciplinas d on d.idDiciplina = m.idDiciplina where m.idCurso = '$idCurso'");
                                    while($diciplinas= $query1->fetch_array()) { ?>

                                        <option value="<?php echo $diciplinas['idDiciplina'];?>"><?php echo utf8_encode($diciplinas['Nome']);  ?></option>

                                    <?php } ?>


                                </select>
                            </label></td>
                        <td><label>
                                <input type="text" name="carga[]" value="<?php echo $rsBuscaModulo['cargaHoraria']; ?>"
                                       class="inputDisciplina">
                            </label></td>
                        <td><label>
                                <select class="ui dropdown" name="requisito[]">
                                    <?php
                                    $idModulo = $rsBuscaModulo['idModulo'];
                                    $sql2 = "select * from modulo m INNER JOIN diciplinas d on m.idDiciplina = d.idDiciplina where m.idModulo = '$idModulo'";
                                    $result=$con->query($sql2);
                                    $sql2=$result->fetch_array();
                                    $requisito = $sql2['prerequisito'];

                                    if($requisito== 0 or $requisito == "") {

                                        ?>
                                        <option value="0">Sem Pré-Requisito</option>
                                    <?php
                                    }else{

                                        $prerequisito = $sql2['prerequisito'];
                                        $sql3 = $con->query("select * from diciplinas WHERE idDiciplina = '$prerequisito'");
                                       $rsSql= $sql3->fetch_array();
                                        ?>
                                        <option value="<?php echo $rsSql['idDiciplina'] ?>"><?php echo utf8_decode($rsSql['Nome']); ?></option>
                                        <?php
                                    }
                                    $sql = "select * from modulo m INNER JOIN diciplinas d on m.idDiciplina = d.idDiciplina where m.idCurso = '$idCurso'";
                                    $result=$con->query($sql);
                                    while($rsResult = $result->fetch_array())
                                    {
                                        ?>
                                        <option value="<?php echo $rsResult['idDiciplina'] ?>"><?php echo utf8_decode($rsResult['Nome']) ?></option>
                                        <?php
                                    }
                                    ?>
                                    <option value="0">Sem pré-requisito</option>
                                </select>
                            </label></td>


                    </tr>



                    </tbody>
                    <?php
                        }
                    }
                    ?>
                   <!-- <tfoot>
                    <tr><th><b>Carga horária total: </b></th>
                        <th></th>
                        <th>130 horas</th>
                        <th></th>
                    </tr></tfoot>-->
                </table>


                <br>
               <?php } ?>

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
            $nomeDis = $_POST['disciplina'];
            $sigla = $_POST['sigla'];
            $cargahoraria = $_POST['carga'];
            $requisito = $_POST['requisito'];
            $id = $_POST['idModulo'];

            editarCurso($idCurso,$nome, $mac, $dataMac, $modulo, $coordenador, $idDisciplina, $nomeDis, $sigla, $cargahoraria, $requisito, $id);

        }


    ?>
<script type="text/javascript">




</script>

    </body>
    </html>