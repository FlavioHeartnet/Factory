<?php

$bd['server'] = "127.0.0.1";
$bd['user'] = 'root';
$bd['password'] = '';
$bd['banco']= 'course-factory';

$con = new mysqli($bd['server'],$bd['user'], $bd['password'], $bd['banco']);
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}else{

    $con ->select_db($bd['banco']);
}



/* check connection */


<<<<<<< HEAD
?>
=======
?>
>>>>>>> 258484e41c84ceb14ea4a1fd2afdadf94a49fefa
