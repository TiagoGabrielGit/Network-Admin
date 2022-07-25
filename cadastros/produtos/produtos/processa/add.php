<?php
require "../../../../conexoes/conexao.php";
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

        if (empty($_POST['inputTamanho'])) {
            $tamanho = "0";
        } else {
            $tamanho = $_POST['inputTamanho'];
        }

        $equipamento = $_POST['equipamento'];
        $fabricante = $_POST['fabricante'];
        $rack = $_POST['equipamentoRack'];
        $result = "INSERT INTO equipamentos (equipamento, rack, fabricante, tamanho, deleted, criado) VALUES ('$equipamento', '$rack', '$fabricante', '$tamanho', '1', NOW())";

        $resultado = mysqli_query($mysqli, $result);

        $equipamento_id = mysqli_insert_id($mysqli);

        $busca_atributos =
        "SELECT
        te.id as id_te,
        te.tipo as tipo
        FROM
        tipoequipamento as te
        WHERE
        te.deleted = 1
        ";

        $result_busca_atributos = mysqli_query($mysqli, $busca_atributos);

        while ($campo = $result_busca_atributos->fetch_assoc()) :
            $id_tipoequipamento = $campo['id_te'];

            $result_insert_atributo = "INSERT INTO equipamentos_atributos (equipamento_id, tipoequipamento_id, active) VALUES ('$equipamento_id','$id_tipoequipamento', '0')";
            $insert_atributos = mysqli_query($mysqli, $result_insert_atributo);

        endwhile;



        if (isset($_POST['inputTipoEquipamento'])) {
            foreach ($_POST['inputTipoEquipamento'] as $id) {

                $result_atributo = "UPDATE equipamentos_atributos SET active='1' WHERE equipamento_id = '$equipamento_id' and tipoequipamento_id = '$id'";
                $resultado_atributo = mysqli_query($mysqli, $result_atributo);
            }
        }

        if (mysqli_affected_rows($mysqli) > 0) { ?>

            <?php
            header("Location: /cadastros/produtos/produtos/view.php?id=$equipamento_id");
            ?>

        <?php } else { ?>
            <!-- Modal -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title" id="myModalLabel">Erro ao realizar cadastro!</h4>
                        </div>
                        <div class="modal-body">
                            <?php echo $equipamento; ?>
                        </div>
                        <div class="modal-footer">
                            <a href="/cadastros/produtos/produtos/index.php"><button type="button" class="btn btn-danger">Ok</button></a>
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