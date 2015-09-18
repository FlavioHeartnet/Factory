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
            Cadastro de turmas equivalentes
        </div>
        <div class="three wide column">
            <div class="ui two column aligned stackable divided grid">
            <!--Input search-->
                <div class="ui search">
                <div class="ui icon input">
                    <input class="prompt" type="text" placeholder="Escolher disciplina...">
                    <i class="search icon"></i>
                </div>
                    <div id="results"></div>
                    </div>

            </div>



        </div>



    </div>
</div>

    <script type="text/javascript">
        $(function () {
            function removeCampo() {
                $(".removerCampo").unbind("click");
                $(".removerCampo").bind("click", function () {
                    if($("tr.linhas").length > 1){
                        $(this).parent().parent().remove();
                    }
                });
            }

            $(".adicionarCampo").click(function () {
                novoCampo = $("tr.linhas:first").clone();
                novoCampo.find("input").val("");
                novoCampo.insertAfter("tr.linhas:last");
                removeCampo();
            });
        });
        var content = [
            { title: 'Andorra' },
            { title: 'United Arab Emirates' },
            { title: 'Afghanistan' },
            { title: 'Antigua' },
            { title: 'Anguilla' },
            { title: 'Albania' },
            { title: 'Armenia' },
            { title: 'Netherlands Antilles' },
            { title: 'Angola' },
            { title: 'Argentina' },
            { title: 'American Samoa' },
            { title: 'Austria' },
            { title: 'Australia' },
            { title: 'Aruba' },
            { title: 'Aland Islands' },
            { title: 'Azerbaijan' },
            { title: 'Bosnia' },
            { title: 'Barbados' },
            { title: 'Bangladesh' },
            { title: 'Belgium' },
            { title: 'Burkina Faso' },
            { title: 'Bulgaria' },
            { title: 'Bahrain' },
            { title: 'Burundi' }
            // etc
        ];

        $('.ui.search')
            .search({
                source: content
            })
        ;



    </script>
</body>
</html>