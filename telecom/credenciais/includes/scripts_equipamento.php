<script>
    function addPermissaoEquipe(idEquipe, idCredencial) {
        $.ajax({
            url: "/api/insert_permissao_credencial_equipe.php",
            method: "GET",
            dataType: "HTML",
            data: {
                idEquipe: idEquipe,
                idCredencial: idCredencial
            }
        })
    }

    function deletaPermissaoEquipe(idCadastroCredencialEquipe) {
        $.ajax({
            url: "/api/deleta_permissao_credencial_equipe.php",
            method: "GET",
            dataType: "HTML",
            data: {
                idCadastroCredencialEquipe: idCadastroCredencialEquipe
            }
        })
    }

    function addPermissaoUsuario(idUsuario, idCredencial) {
        $.ajax({
            url: "/api/insert_permissao_credencial_usuario.php",
            method: "GET",
            dataType: "HTML",
            data: {
                idUsuario: idUsuario,
                idCredencial: idCredencial
            }
        })
    }

    function deletaPermissaoUsuario(idCadastroCredencialUsuario) {
        $.ajax({
            url: "/api/deleta_permissao_credencial_usuario.php",
            method: "GET",
            dataType: "HTML",
            data: {
                idCadastroCredencialUsuario: idCadastroCredencialUsuario
            }
        })
    }    
</script>