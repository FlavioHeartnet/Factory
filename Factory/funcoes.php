<?php

include('config.php');



function addDiciplina($nomeDiciplina, $sigla, $cargaHora, $descricao)
{
    $nomeDiciplina = utf8_decode($nomeDiciplina);
    $sigla = utf8_decode($sigla);
    $cargaHora = utf8_decode($cargaHora);
    $descricao = utf8_decode($descricao);

    $sql = "INSERT INTO diciplinas(Nome, sigla, cargaHoraria, descricao)
VALUES ('$nomeDiciplina','$sigla','$cargaHora','$descricao')";
    $query = mysql_query($sql);

    if($query == true)
    {
        echo "<script>alert('Salvo com sucesso!'); location.href='index.php';</script>";
        return true;
    }else
    {
        echo "<script>alert('Ocorreu um erro ao salvar!'); history.back(-1);</script>";
        return true;
    }
}

function editarDiciplina($idDiciplina,$nomeDiciplina, $sigla, $cargaHora, $descricao)
{
    $nomeDiciplina = utf8_decode($nomeDiciplina);
    $sigla = utf8_decode($sigla);
    $cargaHora = utf8_decode($cargaHora);
    $descricao = utf8_decode($descricao);

    $sql = "UPDATE `diciplinas` SET Nome='$nomeDiciplina',sigla='$sigla',cargaHoraria='$cargaHora', descricao = '$descricao' WHERE idDiciplina = '$idDiciplina'";
    $query = mysql_query($sql);

    if($query == true)
    {
        echo "<script>alert('Atualizado com sucesso!'); location.href='index.php';</script>";
        return true;
    }else
    {
        echo "<script>alert('Ocorreu um erro ao Editar!'); history.back(-1);</script>";
        return true;
    }
}


function addCurso($nome, $mac, $dataMac, $modulo, $coordenador)
{
    $nome = utf8_decode($nome);

    $modulo = utf8_decode($modulo);
    $coordenador = utf8_decode($coordenador);

    $sql = "insert into cursos (Nome, codMac,dataAutoMac,Cordenador,Modulo) values('$nome', '$mac', '$dataMac', '$coordenador', '$modulo')";
    $query = mysql_query($sql);

    if($query == true)
    {
        echo "<script>alert('Salvo com sucesso!'); location.href='curso.php';</script>";
        return true;
    }else
    {
        echo "<script>alert('Ocorreu um erro ao salvar!'); history.back(-1);</script>";
        return true;
    }


}

function editarCurso($idCurso,$nome, $mac, $dataMac, $modulo, $coordenador)
{
    $nome = utf8_decode($nome);
    $mac = utf8_decode($mac);
    $dataMac = utf8_decode($dataMac);
    $modulo = utf8_decode($modulo);
    $coordenador = utf8_decode($coordenador);

    $sql = "UPDATE cursos SET Nome='$nome',codMac='$mac',dataAutoMac='$dataMac',Cordenador='$coordenador',Modulo='$modulo' WHERE idCurso = '$idCurso'";
    $query = mysql_query($sql);

    if($query == true)
    {
        echo "<script>alert('Atualizado com sucesso!'); location.href='curso.php';</script>";
        return true;
    }else
    {
        echo "<script>alert('Ocorreu um erro ao editar!'); history.back(-1);</script>";
        return true;
    }


}

function deleteDiciplina($idDiciplina)
{

    $sql= "DELETE FROM diciplinas WHERE idDiciplina = '$idDiciplina'";
    $query=mysql_query($sql);

    if($query == true)
    {
        echo "<script>alert('Deletado com sucesso!'); location.href='index.php';</script>";
        return true;
    }else
    {
        echo "<script>alert('Ocorreu um erro ao salvar!'); history.back(-1);</script>";
        return true;
    }


}

function deleteCurso($idCurso)
{

    $sql= "DELETE FROM cursos WHERE idCurso = '$idCurso'";
    $query=mysql_query($sql);

    if($query == true)
    {
        echo "<script>alert('Deletado com sucesso!'); location.href='index.php';</script>";
        return true;
    }else
    {
        echo "<script>alert('Ocorreu um erro ao salvar!'); history.back(-1);</script>";
        return true;
    }


}


function addModulo($idCurso, $semestre, $idDiciplina)
{

    $count = count($idDiciplina);

    for($i = 0;$i < $count; $i++) {

        $sql = "insert into modulo (idCurso, semestre, idDiciplina) VALUES ('$idCurso', '$semestre', '$idDiciplina[$i]')";
        $query = mysql_query($sql);
    }
    if($query == true)
    {
        echo "<script>alert('Diciplinas atribuidas ao modulo com sucesso!'); location.href='index.php';</script>";
        return true;
    }else
    {
        echo "<script>alert('Ocorreu um erro ao salvar!'); history.back(-1);</script>";
        return true;
    }




}