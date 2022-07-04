<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>



<!-- PARTE DE CADASTROS -->
<script>
    let inputIP = document.querySelector("#ipaddress");
    inputIP.addEventListener("keydown", function(e) {
        if (e.key >= "0" && e.key <= "9" || e.key == "." || e.key == "Backspace") {

        } else {
            e.preventDefault();
        }
    });
</script>

<script>
    //Pesquisa os equipamentos atraves do fabricante
    $("#fabricante").change(function() {
        var fabricanteSelecionado = $(this).children("option:selected").val();

        $.ajax({
            url: "/api/pesquisa_equipamentos.php",
            method: "GET",
            dataType: "HTML",
            data: {
                id: fabricanteSelecionado
            }
        }).done(function(resposta) {
            $("#equipamento").html(resposta);
        }).fail(function(resposta) {
            alert(resposta)
        });
    });
</script>

<script>
    $("#selecionaEmpresa").change(function() {
        var empresaSelecionada = $(this).children("option:selected").val();

        $.ajax({
            url: "/api/pesquisa_pop.php",
            method: "GET",
            dataType: "HTML",
            data: {
                id: empresaSelecionada
            }
        }).done(function(resposta) {
            $("#listaPop").html(resposta);
        }).fail(function(resposta) {
            alert(resposta)
        });
    });
</script>

<script>
    //Pesquisa os equipamentos atraves do fabricante
    $("#cadastroFabricante").change(function() {
        var fabricanteSelecionado = $(this).children("option:selected").val();

        $.ajax({
            url: "/api/pesquisa_equipamentos.php",
            method: "GET",
            dataType: "HTML",
            data: {
                id: fabricanteSelecionado
            }
        }).done(function(resposta) {
            $("#cadastroEquipamento").html(resposta);
        }).fail(function(resposta) {
            alert(resposta)
        });
    });
</script>

<script>
    $("#cadastroEmpresa").change(function() {
        var empresaSelecionada = $(this).children("option:selected").val();

        $.ajax({
            url: "/api/pesquisa_pop.php",
            method: "GET",
            dataType: "HTML",
            data: {
                id: empresaSelecionada
            }
        }).done(function(resposta) {
            $("#cadastroPop").html(resposta);
        }).fail(function(resposta) {
            alert(resposta)
        });
    });
</script>


<!-- PARTE DE PESQUISAS -->
<script>
    let inputIPPesquisa = document.querySelector("#ipaddressPesquisa");
    inputIPPesquisa.addEventListener("keydown", function(e) {
        if (e.key >= "0" && e.key <= "9" || e.key == "." || e.key == "Backspace") {

        } else {
            e.preventDefault();
        }
    });
</script>

<script>
    $("#empresaPesquisa").change(function() {
        var empresaSelecionada = $(this).children("option:selected").val();

        $.ajax({
            url: "/api/pesquisa_pop.php",
            method: "GET",
            dataType: "HTML",
            data: {
                id: empresaSelecionada
            }
        }).done(function(resposta) {
            $("#popPesquisa").html(resposta);
        }).fail(function(resposta) {
            alert(resposta)
        });
    });
</script>

<script>
    //Pesquisa os equipamentos atraves do fabricante
    $("#fabricantePesquisa").change(function() {
        var fabricanteSelecionado = $(this).children("option:selected").val();

        $.ajax({
            url: "/api/pesquisa_equipamentos.php",
            method: "GET",
            dataType: "HTML",
            data: {
                id: fabricanteSelecionado
            }
        }).done(function(resposta) {
            $("#equipamentoPesquisa").html(resposta);
        }).fail(function(resposta) {
            alert(resposta)
        });
    });
</script>

<!-- PARTE DE VIEW -->
<script>
    //Pesquisa os equipamentos atraves do fabricante
    $("#inputFabricante").change(function() {
        var fabricanteSelecionadoView = $(this).children("option:selected").val();

        $.ajax({
            url: "/api/pesquisa_equipamentos.php",
            method: "GET",
            dataType: "HTML",
            data: {
                id: fabricanteSelecionadoView
            }
        }).done(function(resposta) {
            $("#inputEquipamento").html(resposta);
        }).fail(function(resposta) {
            alert(resposta)
        });
    });
</script>

<script>
    let inputIPView = document.querySelector("#inputIpAddress");
    inputIPView.addEventListener("keydown", function(e) {
        if (e.key >= "0" && e.key <= "9" || e.key == "." || e.key == "Backspace") {

        } else {
            e.preventDefault();
        }
    });
</script>

