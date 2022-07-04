
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


<script>
    //Pesquisa os estados passando ID do país
    $("#inputNome").change(function() {
        var nomeSelecionado = $(this).children("option:selected").val();

        $.ajax({
            url: "/api/pesquisa_email.php",
            method: "GET",
            dataType: "HTML",
            data: {
                id: nomeSelecionado
            }
        }).done(function(resposta) {
            $("#inputEmail").html(resposta);
        }).fail(function(resposta) {
            alert(resposta)
        });
    });
</script>

<script>
    //Pesquisa os estados passando ID do país
    $("#inputNome").change(function() {
        var nomeSelecionado = $(this).children("option:selected").val();

        $.ajax({
            url: "/api/pesquisa_email.php",
            method: "GET",
            dataType: "HTML",
            data: {
                id: nomeSelecionado
            }
        }).done(function(resposta) {
            $("#inputEmailHidden").html(resposta);
        }).fail(function(resposta) {
            alert(resposta)
        });
    });
</script>