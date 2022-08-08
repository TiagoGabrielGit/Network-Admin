<?php
require "../../includes/menu.php";
require "../../conexoes/conexao.php";
require "../../includes/remove_setas_number.php";
require "sql.php";
?>

<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql_sql_equipamentopop =
    "SELECT
eqpop.id as id_equipamentoPop,
eqpop.hostname as hostname,
eqpop.pop_id as id_pop,
eqpop.ipaddress as ipaddress,
eqpop.serialEquipamento as serialEquipamento,
eqpop.anotacaoEquipamento as anotacaoEquipamento,
eqpop.statusEquipamento as eqpopstatus,
eqpop.portaWeb as portaWeb,
eqpop.portaTelnet as portaTelnet,
eqpop.portaSSH as portaSSH,
eqpop.portaWinbox as portaWinbox,
emp.fantasia as nome_empresa,
emp.id as id_empresa,
pop.pop as nome_pop,
eqp.id as id_equipamento,
eqp.equipamento as nome_equipamento,
eqp.rack as rack,
fab.id as id_fabricante,
fab.fabricante as nome_fabricante,
tipo.id as id_tipoEquipamento,
tipo.tipo as nome_tipoEquipamento,
rack.id as id_rack,
rack.nomenclatura as nome_rack
FROM
equipamentospop as eqpop
LEFT JOIN
empresas as emp
ON
emp.id = eqpop.empresa_id
LEFT JOIN
pop as pop
ON
pop.id = eqpop.pop_id
LEFT JOIN
equipamentos as eqp
ON
eqp.id = eqpop.equipamento_id
LEFT JOIN
fabricante as fab
ON
fab.id = eqp.fabricante
LEFT JOIN
tipoequipamento as tipo
ON
tipo.id = eqpop.tipoEquipamento_id
LEFT JOIN
pop_rack as rack
ON
eqpop.rack_id = rack.id
WHERE
eqpop.id = '$id'
";

$resultado = mysqli_query($mysqli, $sql_sql_equipamentopop);
$row = mysqli_fetch_assoc($resultado);

$hostnameEquipamento = $row['hostname'];

?>

<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Código <?php echo $row['id_equipamentoPop']; ?> -
                            <?php echo $row['hostname']; ?></h5>

                        <form method="POST" action="processa/edit.php" class="row g-3">

                            <input name="id" type="text" class="form-control" id="id" value="<?php echo $row['id_equipamentoPop']; ?>" hidden>

                            <div class="col-3">
                                <label for="inputEmpresa" class="form-label">Empresa*</label>
                                <select id="inputEmpresa" name="inputEmpresa" class="form-select" required>
                                    <option value="<?= $row['id_empresa']; ?>"><?= $row['nome_empresa']; ?></option>
                                    <?php
                                    $resultado = mysqli_query($mysqli, $sql_lista_empresas);
                                    while ($emp = $resultado->fetch_assoc()) : ?>
                                        <option value="<?= $emp['id']; ?>"><?= $emp['empresa']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="col-2">
                                <label for="editEquipamentoPop" class="form-label">POP*</label>
                                <select id="editEquipamentoPop" name="editEquipamentoPop" class="form-select" value="<?php echo $row['nome_pop']; ?>" required>
                                    <option value="<?= $row['id_pop']; ?>"><?= $row['nome_pop']; ?></option>

                                </select>
                            </div>

                            <?php
                            if ($row['rack'] == "1") { ?>
                                <div class="col-4">
                                    <label for="editEquipamentoRack1" class="form-label">Rack*</label>
                                    <select id="editEquipamentoRack1" name="editEquipamentoRack1" class="form-select" required>
                                        <option value="<?= $row['id_rack']; ?>"><?= $row['nome_rack']; ?></option>
                                    </select>
                                </div>
                            <?php } else { ?>
                                <div class="col-4"></div>
                            <?php } ?>

                            <div class="col-4">
                                <label for="inputHostname" class="form-label">Hostname*</label>
                                <input name="inputHostname" type="text" class="form-control" id="inputHostname" value="<?= $row['hostname']; ?>" required>
                            </div>

                            <hr class="sidebar-divider">

                            <div class="col-4">
                                <label for="inputFabricante" class="form-label">Fabricante*</label>
                                <select id="inputFabricante" name="inputFabricante" class="form-select" value="<?= $row['nome_cidade']; ?>" required>
                                    <option value="<?= $row['id_fabricante']; ?>"><?= $row['nome_fabricante']; ?>
                                    </option>
                                    <?php
                                    $resultado = mysqli_query($mysqli, $sql_lista_fabricantes);
                                    while ($c = $resultado->fetch_assoc()) : ?>
                                        <option value="<?= $c['id']; ?>"><?= $c['fabricante']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="col-4">
                                <label for="inputEquipamento" class="form-label">Equipamento*</label>
                                <select id="inputEquipamento" name="inputEquipamento" class="form-select" required>
                                    <option value="<?= $row['id_equipamento']; ?>"><?= $row['nome_equipamento']; ?>
                                    </option>
                                </select>
                            </div>

                            <div class="col-4">
                                <label for="inputTipoEquipamento" class="form-label select-label">Tipo de
                                    equipamento*</label>
                                <select id="inputTipoEquipamento" name="inputTipoEquipamento" class="form-select" required>
                                    <option value="<?= $row['id_tipoEquipamento']; ?>">
                                        <?= $row['nome_tipoEquipamento']; ?></option>

                                </select>
                            </div>

                            <div class="col-4">
                                <label for="inputIpAddress" class="form-label">Endereço IP*</label>
                                <input name="inputIpAddress" type="text" class="form-control" id="inputIpAddress" value="<?php echo $row['ipaddress']; ?>" maxlength="15" required>
                            </div>

                            <div class="col-4">
                                <label for="inputSerial" class="form-label">Serial</label>
                                <input name="inputSerial" type="text" class="form-control" id="inputSerial" value="<?= $row['serialEquipamento']; ?>">
                            </div>

                            <div class="col-4">
                                <label for="inputStatus" class="form-label select-label">Status*</label>
                                <select id="inputStatus" name="inputStatus" class="form-select" required>
                                    <option value="<?= $row['eqpopstatus']; ?>"><?= $row['eqpopstatus']; ?></option>
                                    <option value="Ativado">Ativado</option>
                                    <option value="Em Implementação">Em Implementação</option>
                                    <option value="Inativado">Inativado</option>
                                </select>
                            </div>

                            <hr class="sidebar-divider">

                            <div class="col-2">
                                <label for="portaWeb" class="form-label select-label">Porta WEB</label>
                                <input id="portaWeb" name="portaWeb" class="form-control" value="<?= $row['portaWeb'] ?>"></input>
                            </div>

                            <div class="col-2">
                                <label for="portaSSH" class="form-label select-label">Porta SSH</label>
                                <input id="portaSSH" name="portaSSH" class="form-control" value="<?= $row['portaSSH'] ?>"></input>
                            </div>

                            <div class="col-2">
                                <label for="portaTelnet" class="form-label select-label">Porta Telnet</label>
                                <input id="portaTelnet" name="portaTelnet" class="form-control" value="<?= $row['portaTelnet'] ?>"></input>
                            </div>

                            <?php
                            if ($row['nome_fabricante'] == "Mikrotik") { ?>
                                <div class="col-2">
                                    <label for="portaWinbox" class="form-label select-label">Porta Winbox</label>
                                    <input id="portaWinbox" name="portaWinbox" class="form-control" value="<?= $row['portaWinbox'] ?>"></input>
                                </div>
                            <?php } ?>

                            <div class="col-12">
                                <label for="anotacaoEquipamento" class="form-label">Anotações</label>
                                <textarea id="anotacaoEquipamento" name="anotacaoEquipamento" class="form-control" maxlength="10000" rows="4"><?php echo $row['anotacaoEquipamento'] ?></textarea>
                            </div>

                            <div class="col-4" style="text-align: left;">
                                <a onclick="capturaDados(<?= $id ?>, '<?= $row['hostname']; ?>')" data-bs-toggle="modal" data-bs-target="#basicModalCredenciais"><input type="button" class="btn btn-info" value="Visualizar credenciais"></input></a>
                            </div>

                            <div class="col-4" style="text-align: center;">
                                <button name="salvar" type="submit" class="btn btn-primary">Salvar</button>
                                <a href="/telecom/equipamentos/index.php"><input type="button" value="Voltar" class="btn btn-secondary"></a>
                            </div>

                            <div class="col-4" style="text-align: right;">
                                <a href="processa/delete.php?id=<?= $id ?>"><input type="button" class="btn btn-danger" value="Excluir permanente"></input></a>
                            </div>
                        </form><!-- Vertical Form -->

                    </div>
                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->

<script>
    function capturaDados(id, equipamento) {
        document.querySelector("#idEquipamentoModal").value = id;
        document.querySelector("#EquipamentoModal").value = equipamento;
    }
</script>

<div class=" modal fade" id="basicModalCredenciais" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Senhas cadastradas</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <div class="card">
                    <div class="col-lg-12">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <label for="idEquipamentoModal" class="form-label">ID</label>
                                    <input type="Text" name="idEquipamentoModal" class="form-control" id="idEquipamentoModal" disabled>
                                </div>

                                <div class="col-6">
                                    <label for="EquipamentoModal" class="form-label">Equipamento</label>
                                    <input type="Text" name="EquipamentoModal" class="form-control" id="EquipamentoModal" disabled>
                                </div>

                                <div class="col-3" style="margin-top: 30px; text-align: right;">
                                    <a onclick="AddSenhaEquipamento(<?= $row['id_equipamentoPop'] ?>, '<?= $hostnameEquipamento ?>', '<?= $row['id_empresa'] ?>')" data-bs-toggle="modal" data-bs-target="#AddSenhaEquipamento">
                                        <button title="Adicionar novo" type="button" class="btn btn-info">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                                            </svg>
                                        </button>
                                    </a>
                                </div>

                            </div>
                            <hr class="sidebar-divider">

                            <div class="col-12">
                                <div class="accordion" id="accordionExample">
                                    <?php
                                    $sql_credenciais =
                                        "SELECT
                                        ce.id as id_credencial,
                                        ce.equipamentodescricao as descricao,
                                        ce.equipamentousuario as eqpuser,
                                        ce.equipamentosenha as eqpsenha,
                                        e.ipaddress as ip
                                        FROM
                                        credenciais_equipamento as ce
                                        LEFT JOIN
                                        equipamentospop as e
                                        ON
                                        e.id = ce.equipamento_id
                                        WHERE
                                        ce.active = 1
                                        and
                                        ce.equipamento_id = $id";

                                    $resultado_credenciais = mysqli_query($mysqli, $sql_credenciais)  or die("Erro ao retornar dados");
                                    $cont = 1;

                                    while ($campos = $resultado_credenciais->fetch_array()) {
                                        $id_credencial = $campos['id_credencial'];

                                    ?>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading<?= $cont ?>"> <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $cont ?>" aria-expanded="false" aria-controls="collapse<?= $cont ?>"> <?= $campos['descricao'] ?> </button></h2>
                                            <div id="collapse<?= $cont ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $cont ?>" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body">
                                                    <div class="row justify-content-between">
                                                        <div class="col-9">
                                                            <strong>IP:</strong><?= $campos['ip']; ?><br>
                                                            <strong>Usuário:</strong> <?= $campos['eqpuser']; ?> <br>
                                                            <strong>Senha:</strong> <?= $campos['eqpsenha']; ?> <br>
                                                        </div>
                                                        <div class="col-3">
                                                            <a href="/telecom/credenciais/view.php?id=<?= $id_credencial ?>&tipo=Equipamento" title="Editar">
                                                                <button type="button" class="btn btn-warning">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wrench-adjustable-circle" viewBox="0 0 16 16">
                                                                        <path d="M12.496 8a4.491 4.491 0 0 1-1.703 3.526L9.497 8.5l2.959-1.11c.027.2.04.403.04.61Z"></path>
                                                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0Zm-1 0a7 7 0 1 0-13.202 3.249l1.988-1.657a4.5 4.5 0 0 1 7.537-4.623L7.497 6.5l1 2.5 1.333 3.11c-.56.251-1.18.39-1.833.39a4.49 4.49 0 0 1-1.592-.29L4.747 14.2A7 7 0 0 0 15 8Zm-8.295.139a.25.25 0 0 0-.288-.376l-1.5.5.159.474.808-.27-.595.894a.25.25 0 0 0 .287.376l.808-.27-.595.894a.25.25 0 0 0 .287.376l1.5-.5-.159-.474-.808.27.596-.894a.25.25 0 0 0-.288-.376l-.808.27.596-.894Z"></path>
                                                                    </svg>

                                                                </button>
                                                            </a>
                                                            <a href="/telecom/equipamentos/processa/active.php?id=<?= $id_credencial ?>&parametro=0&idEquipamento=<?= $id ?>" title="Inativar">
                                                                <button type="button" class="btn btn-danger">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-dash-circle" viewBox="0 0 16 16">
                                                                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                                                        <path d="M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z" />
                                                                    </svg>
                                                                </button>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    <?php $cont++;
                                    } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
require "modalSenhaEquipamento.php";
require "../../scripts/equipamentosPop.php";
require "../../includes/footer.php";
?>