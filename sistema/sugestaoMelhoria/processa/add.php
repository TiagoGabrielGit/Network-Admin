<?php
require "../../protect.php";
require "../../conexoes/conexao.php";
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Network Admin</title>
    <link href="/alerts/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="/alerts/js/bootstrap.min.js"></script>
</head> 

<body>
    <div class="container theme-showcase" role="main">
        <?php
        $tituloMelhoria = $_POST['tituloMelhoria'];
        $descricaoMelhoria = $_POST['descricaoMelhoria'];
        $usuarioCriador = $_POST['usuarioCriador'];
        $result = "INSERT INTO sugereMelhoria (tituloMelhoria, descricaoMelhoria, usuarioCriador, situacao, deleted, criado) VALUES ('$tituloMelhoria', '$descricaoMelhoria', '$usuarioCriador', 'Aberto', '0', NOW())";
        $resultado = mysqli_query($mysqli, $result);

        if (mysqli_affected_rows($mysqli) > 0) { ?>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Obrigado <?php echo $_SESSION['nome'];?> por nos ajudar a melhorar o nosso sistema! Em breve estaremos avaliando sua sugestão.</h4>
                        </div>
                        <div class="modal-footer">
                            <a href="/sugestaoMelhoria/sugereMelhoria.php"><button type="button" class="btn btn-success">Ok</button></a>
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
                            <h4 class="modal-title" id="myModalLabel">Erro ao realizar sugestão!</h4>
                        </div>
                        <div class="modal-footer">
                            <a href="/sugestaoMelhoria/sugereMelhoria.php"><button type="button" class="btn btn-danger">Ok</button></a>
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