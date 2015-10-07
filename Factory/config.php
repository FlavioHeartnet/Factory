<?php

$bd['server'] = "127.0.0.1";
$bd['user'] = 'root';
$bd['password'] = '';
$bd['banco']= 'course-factory';

$con = mysql_connect($bd['server'],$bd['user'], $bd['password'], $bd['banco']);
if($con == true)
{
    mysql_select_db($bd['banco'], $con);

}else{echo "<script>alert('conexão mal sucedida!');</script>";}


