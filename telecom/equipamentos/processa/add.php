<?php
require "../../../protect.php";
require "../../../conexoes/conexao.php";
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

        //Obtem os dados
        $cadastroEmpresa = $_POST['cadastroEmpresa'];
        $cadastroPop = $_POST['cadastroPop'];
        $cadastroEquipamento = $_POST['cadastroEquipamento'];
        $cadastroTipoEquipamento = $_POST['cadastroTipoEquipamento'];
        $hostname = $_POST['hostname'];
        $ipaddress = $_POST['ipaddress'];
        $statusEquipamento = $_POST['statusEquipamento'];
        $anotacaoEquipamento = nl2br($_POST['anotacaoEquipamento']);


        //Realiza o cadastro
        $result = "INSERT INTO equipamentospop (empresa_id, pop_id, equipamento_id, tipoEquipamento_id, hostname, ipaddress, statusEquipamento, anotacaoEquipamento, deleted, criado)
        VALUES ('$cadastroEmpresa', '$cadastroPop', '$cadastroEquipamento', '$cadastroTipoEquipamento', '$hostname', '$ipaddress', '$statusEquipamento', '$anotacaoEquipamento', '1', NOW())";
        $resultado = mysqli_query($mysqli, $result);

        if (mysqli_affected_rows($mysqli) > 0) { ?>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Cadastro realizado com Sucesso!</h4>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <a href="/telecom/equipamentos/index.php"><button type="button" class="btn btn-success">Ok</button></a>
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
                            <h4 class="modal-title" id="myModalLabel">Erro ao realizar cadastro!</h4>
                        </div>
                        <div class="modal-body">
                        </div>
                        <div class="modal-footer">
                            <a href="/telecom/equipamentos/index.php"><button type="button" class="btn btn-danger">Ok</button></a>
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