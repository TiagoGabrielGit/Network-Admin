<?php
require "../../includes/menu.php";
require "../../conexoes/conexao.php";
require "../../includes/remove_setas_number.php";
require "sql.php";
?>

<?php
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$sql_sql_vm =
    "SELECT
vm.id as idvm,
vm.hostname as hostname,
vm.ipaddress as ipaddress,
vm.dominio as dominio,
vm.statusVM as statusVM,
vm.anotacaoVM as anotacaoVM,
vm.recursoMemoria as recursoMemoria,
vm.recursoCPU as recursoCPU,
vm.recursoDisco1 as recursoDisco1,
vm.recursoDisco2 as recursoDisco2,
vm.vlan as vlan,
pop.id as id_pop,
pop.pop as nome_pop,
emp.id as id_empresa,
emp.fantasia as nome_empresa,
eqpop.id as id_servidor,
eqpop.hostname as nome_servidor,
so.id as id_so,
so.sistemaoperacional as nome_so
FROM
vms as vm
LEFT JOIN
pop as pop
ON
pop.id = vm.pop_id
LEFT JOIN
empresas as emp
ON
emp.id = vm.empresa_id
LEFT JOIN
equipamentospop as eqpop
ON
eqpop.id = vm.servidor_id
LEFT JOIN
sistemaoperacional as so
ON
so.id = vm.sistemaOperacional
WHERE
vm.id = '$id'
";

$resultado = mysqli_query($mysqli, $sql_sql_vm);
$row = mysqli_fetch_assoc($resultado);

?>

<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Código <?php echo $row['idvm']; ?> - <?php echo $row['hostname']; ?></h5>

                        <form method="POST" action="processa/edit.php" class="row g-3">

                            <input name="id" type="text" class="form-control" id="id" value="<?php echo $row['idvm']; ?>" hidden>

                            <div class="col-4">
                                <label for="editEmpresa" class="form-label">Empresa</label>
                                <select id="editEmpresa" name="editEmpresa" class="form-select" required>
                                    <option value="<?= $row['id_empresa']; ?>"><?= $row['nome_empresa']; ?></option>
                                    <?php
                                    $resultado = mysqli_query($mysqli, $sql_lista_empresas);
                                    while ($emp = $resultado->fetch_assoc()) : ?>
                                        <option value="<?= $emp['id']; ?>"><?= $emp['empresa']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="col-2">
                                <label for="editPOP" class="form-label">POP</label>
                                <select id="editPOP" name="editPOP" class="form-select" required>
                                    <option value="<?= $row['id_pop']; ?>"><?= $row['nome_pop']; ?></option>
                                </select>
                            </div>

                            <div class="col-4">
                                <label for="editServidor" class="form-label">Servidor virtualizador</label>
                                <select value id="editServidor" name="editServidor" class="form-select" required>
                                    <option value="<?= $row['id_servidor']; ?>"><?= $row['nome_servidor']; ?></option>
                                </select>
                            </div>

                            <hr class="sidebar-divider">

                            <div class="col-4">
                                <label for="editHostname" class="form-label">Hostname</label>
                                <input name="editHostname" type="text" class="form-control" id="editHostname" value="<?php echo $row['hostname'] ?>" required>
                            </div>


                            <div class="col-4">
                                <label for="editSO" class="form-label">Sistema operacional</label>
                                <select id="editSO" name="editSO" class="form-select" required>
                                    <option value="<?= $row['id_so']; ?>"><?= $row['nome_so']; ?></option>
                                    <?php
                                    $resultado = mysqli_query($mysqli, $sql_lista_so);
                                    while ($so = mysqli_fetch_object($resultado)) :
                                        echo "<option value='$so->id'> $so->so</option>";
                                    endwhile;
                                    ?>
                                </select>
                            </div>

                            <div class="col-4"></div>

                            <div class="col-3">
                                <label for="editIPAddress" class="form-label">Endereço IP</label>
                                <input id="editIPAddress" name="editIPAddress" type="text" class="form-control" value="<?php echo $row['ipaddress']; ?>" maxlength="15" required>
                            </div>

                            <div class="col-3">
                                <label for="editDominio" class="form-label">Dominio</label>
                                <input id="editDominio" name="editDominio" type="text" class="form-control" value="<?php echo $row['dominio']; ?>" required>
                            </div>

                            <div class="col-2">
                                <label for="editVLAN" class="form-label">VLAN</label>
                                <input id="editVLAN" name="editVLAN" type="number" maxlength="4" class="form-control" value="<?php echo $row['vlan']; ?>">
                            </div>

                            <div class="col-3">
                                <label for="editStatusVM" class="form-label">Status</label>
                                <select id="editStatusVM" name="editStatusVM" class="form-select" required>
                                    <option value="<?= $row['statusVM']; ?>"><?= $row['statusVM']; ?></option>
                                    <option value="Ativado">Ativado</option>
                                    <option value="Em Implementação">Em Implementação</option>
                                    <option value="Inativado">Inativado</option>
                                </select>
                            </div>

                            <div class="col-3">
                                <label for="editMemoria" class="form-label">Memória (Mb)*</label>
                                <input name="editMemoria" type="number" class="form-control" id="editMemoria" value="<?php echo $row['recursoMemoria']; ?>" required>
                            </div>

                            <div class="col-2">
                                <label for="editVCPU" class="form-label">vCPU*</label>
                                <input name="editVCPU" type="number" class="form-control" id="editVCPU" value="<?php echo $row['recursoCPU']; ?>" required>
                            </div>

                            <div class="col-3">
                                <label for="editDisco1" class="form-label">Disco partição 1 (Gb)*</label>
                                <input name="editDisco1" type="number" class="form-control" id="editDisco1" value="<?php echo $row['recursoDisco1']; ?>" required>
                            </div>

                            <div class="col-3">
                                <label for="editDisco2" class="form-label">Disco partição 2 (Gb)</label>
                                <input name="editDisco2" type="number" class="form-control" id="editDisco2" value="<?php echo $row['recursoDisco2']; ?>">
                            </div>

                            <div class="col-12">
                                <label for="anotacaoVM" class="form-label">Anotações</label>
                                <textarea id="anotacaoVM" name="anotacaoVM" maxlength="10000" class="form-control" rows="4"><?php echo $row['anotacaoVM'] ?></textarea>
                            </div>

                            <div class="col-4" style="text-align: left;">
                                <a onclick="visualizarCredenciais(<?= $id ?>, '<?= $row['hostname']; ?>')" data-bs-toggle="modal" data-bs-target="#visualizaCredenciais"><input type="button" class="btn btn-info" value="Visualizar credenciais"></input></a>
                            </div>

                            <div class="col-4" style="text-align: center;">
                                <button name="salvar" type="submit" class="btn btn-primary">Salvar</button>
                                <a href="/telecom/vms/index.php"><input type="button" value="Voltar" class="btn btn-secondary"></a>
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
    function visualizarCredenciais(id, VM) {
        document.querySelector("#idVMModal").value = id;
        document.querySelector("#VMModal").value = VM;
    }
</script>

<div class=" modal fade" id="visualizaCredenciais" tabindex="-1">
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
                                    <label for="idVMModal" class="form-label">ID</label>
                                    <input type="Text" name="idVMModal" class="form-control" id="idVMModal" disabled>
                                </div>

                                <div class="col-6">
                                    <label for="VMModal" class="form-label">VM</label>
                                    <input type="Text" name="VMModal" class="form-control" id="VMModal" disabled>
                                </div>

                                <div class="col-3" style="margin-top: 30px; text-align: right;">
                                    <a onclick="AddSenhaVM(<?= $row['idvm'] ?>, '<?= $row['hostname'] ?>', '<?= $row['id_empresa'] ?>')" data-bs-toggle="modal" data-bs-target="#AddSenhaVM">
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
                                        cv.id as id_credencial,
                                        cv.vmdescricao as descricao,
                                        cv.vmusuario as vmuser,
                                        cv.vmsenha as vmsenha,
                                        vm.ipaddress as ip
                                        FROM
                                        credenciais_vms as cv
                                        LEFT JOIN
                                        vms as vm
                                        ON
                                        vm.id = cv.vm_id
                                        WHERE
                                        cv.active = 1
                                        and
                                        cv.vm_id = $id";

                                    $resultado_credenciais = mysqli_query($mysqli, $sql_credenciais)  or die("Erro ao retornar dados");
                                    $cont = 1;

                                    while ($campos = $resultado_credenciais->fetch_array()) {
                                        $id_credencial = $campos['id_credencial'];

                                    ?>

                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="heading<?= $cont ?>">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?= $cont ?>" aria-expanded="false" aria-controls="collapse<?= $cont ?>">
                                                    <?= $campos['descricao'] ?>
                                                </button>
                                            </h2>
                                            <div id="collapse<?= $cont ?>" class="accordion-collapse collapse" aria-labelledby="heading<?= $cont ?>" data-bs-parent="#accordionExample" style="">
                                                <div class="accordion-body">
                                                    <div class="row justify-content-between">
                                                        <div class="col-9">
                                                            <strong>IP:</strong> <?= $campos['ip']; ?><br>
                                                            <strong>Usuário:</strong> <?= $campos['vmuser']; ?> <br>
                                                            <strong>Senha:</strong> <?= $campos['vmsenha']; ?><br>
                                                        </div>
                                                        <div class="col-3">
                                                            <a href="/telecom/credenciais/view.php?id=<?= $id_credencial ?>&tipo=VM" title="Editar">
                                                                <button type="button" class="btn btn-warning">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wrench-adjustable-circle" viewBox="0 0 16 16">
                                                                        <path d="M12.496 8a4.491 4.491 0 0 1-1.703 3.526L9.497 8.5l2.959-1.11c.027.2.04.403.04.61Z"></path>
                                                                        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0Zm-1 0a7 7 0 1 0-13.202 3.249l1.988-1.657a4.5 4.5 0 0 1 7.537-4.623L7.497 6.5l1 2.5 1.333 3.11c-.56.251-1.18.39-1.833.39a4.49 4.49 0 0 1-1.592-.29L4.747 14.2A7 7 0 0 0 15 8Zm-8.295.139a.25.25 0 0 0-.288-.376l-1.5.5.159.474.808-.27-.595.894a.25.25 0 0 0 .287.376l.808-.27-.595.894a.25.25 0 0 0 .287.376l1.5-.5-.159-.474-.808.27.596-.894a.25.25 0 0 0-.288-.376l-.808.27.596-.894Z"></path>
                                                                    </svg>

                                                                </button>
                                                            </a>
                                                            <a href="/telecom/vms/processa/active.php?id=<?= $id_credencial ?>&parametro=0&idVM=<?= $id ?>" title="Inativar">
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
require "modalSenhaVM.php";
require "../../scripts/vms.php";
require "../../includes/footer.php";
?>