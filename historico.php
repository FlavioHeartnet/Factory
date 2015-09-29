<?php
include("topo.php");

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
           Historicos
        </div>


            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <div class="ui two column center aligned stackable divided grid">

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
    <tr>
        <td>....</td>
    </tr>
</table>

        </div>
                </form>
    </div>
        </div>


</body>
</html>
