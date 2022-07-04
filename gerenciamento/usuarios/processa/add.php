<?php
require "../../../conexoes/conexao.php";
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Gigafull Admin</title>
    <link href="/alerts/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/alerts/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container theme-showcase" role="main">
        <?php
        $nome = $_POST['inputNome'];
        $nome = $_POST['inputNome'];
        $email = $_POST['inputEmailHidden'];
        $perfil = $_POST['perfil'];
        $senha = md5($_POST['senha']);

        $result_usuario = "INSERT INTO usuarios (pessoa_id, email, senha, cadastroDefault, deleted, criado) VALUES ('$nome', '$email', '$senha', '2', '1', NOW())";
        $resultado_usuario = mysqli_query($mysqli, $result_usuario);

        //Obtem ID do cadastro realizado
        $id_usuario = mysqli_insert_id($mysqli);

        $result_perfil = "INSERT INTO usuarios_perfil (usuario_id, permissao_id, deleted, criado) VALUES ('$id_usuario', '$perfil', '1', NOW())";
        $resultado_perfil = mysqli_query($mysqli, $result_perfil);

        if (mysqli_affected_rows($mysqli) > 0) { ?>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Usuário cadastrado com Sucesso!</h4>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <a href="/gerenciamento/usuarios/usuarios.php"><button type="button" class="btn btn-success">Ok</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#myModal').modal('show');
                });
            </script>

        <?php } else { ?>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Erro ao cadastrar novo usuário!</h4>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <a href="/gerenciamento/usuarios/usuarios.php"><button type="button" class="btn btn-danger">Ok</button></a>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $(document).ready(function() {
                    $('#myModal').modal('show');
                });
            </script>
        <?php } ?>
    </div>
</body>

</html>