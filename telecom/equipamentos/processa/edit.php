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
        <title>Gigafull Admin</title>
        <link href="/alerts/css/bootstrap.min.css" rel="stylesheet">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="/alerts/js/bootstrap.min.js"></script>
</head>

<body>
        <div class="container theme-showcase" role="main">
                <?php
                $id = $_POST['id'];

                //Captura todos os dados        
                $inputEmpresa = $_POST['inputEmpresa'];
                $inputPop = $_POST['inputPop'];
                $inputHostname = $_POST['inputHostname'];
                $inputFabricante = $_POST['inputFabricante'];
                $inputEquipamento = $_POST['inputEquipamento'];
                $inputTipoEquipamento = $_POST['inputTipoEquipamento'];
                $inputIpAddress = $_POST['inputIpAddress'];
                $inputStatus = $_POST['inputStatus'];
                $comunidadeSNMPRead = $_POST['comunidadeSNMPRead'];
                $comunidadeSNMPWrite = $_POST['comunidadeSNMPWrite'];
                $usuarioIntegracao = $_POST['usuarioIntegracao'];
                $senhaIntegracao = $_POST['senhaIntegracao'];
                $anotacaoPublicaEquipamento = $_POST['anotacaoPublicaEquipamento'];
                $usuario_id = $_SESSION['id'];
             
                $result_insert_apube = "INSERT INTO anotacaopublicaequipamento (usuario_id, equipamento_id, anotacao, criado) VALUES ('$usuario_id', '$id', '$anotacaoPublicaEquipamento', NOW())";
                $resultado_apube = mysqli_query($mysqli, $result_insert_apube);


                $result_update_eqpop = "UPDATE equipamentospop SET empresa_id='$inputEmpresa', pop_id='$inputPop', ipaddress='$inputIpAddress', hostname='$inputHostname', tipoEquipamento_id='$inputTipoEquipamento', equipamento_id='$inputEquipamento', statusEquipamento='$inputStatus', 
                comunidadeSNMPRead='$comunidadeSNMPRead', comunidadeSNMPWrite='$comunidadeSNMPWrite', usuarioIntegracao='$usuarioIntegracao', senhaIntegracao='$senhaIntegracao', modificado=NOW() WHERE id='$id'";               
                $resultado_eqpop = mysqli_query($mysqli, $result_update_eqpop);


                if (mysqli_affected_rows($mysqli) > 0) { ?>
                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                                <div class="modal-header">
                                                        <h4 class="modal-title" id="myModalLabel">Editado com Sucesso!</h4>
                                                </div>
                                                <div class="modal-body">
                                                        <?php echo $inputHostname; ?>
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
                                                        <h4 class="modal-title" id="myModalLabel">Erro ao editar!</h4>
                                                </div>
                                                <div class="modal-body">
                                                        <?php echo $inputHostname; ?>
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