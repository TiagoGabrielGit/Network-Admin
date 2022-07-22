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
                                <select id="editEmpresa" name="editEmpresa" class="form-select" require>
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
                                <select id="editPOP" name="editPOP" class="form-select" require>
                                    <option value="<?= $row['id_pop']; ?>"><?= $row['nome_pop']; ?></option>
                                </select>
                            </div>

                            <div class="col-4">
                                <label for="editServidor" class="form-label">Servidor virtualizador</label>
                                <select value id="editServidor" name="editServidor" class="form-select" require>
                                    <option value="<?= $row['id_servidor']; ?>"><?= $row['nome_servidor']; ?></option>
                                </select>
                            </div>

                            <hr class="sidebar-divider">

                            <div class="col-4">
                                <label for="editHostname" class="form-label">Hostname</label>
                                <input name="editHostname" type="text" class="form-control" id="editHostname" value="<?php echo $row['hostname'] ?>" require>
                            </div>


                            <div class="col-4">
                                <label for="editSO" class="form-label">Sistema operacional</label>
                                <select id="editSO" name="editSO" class="form-select" require>
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
                                <input id="editIPAddress" name="editIPAddress" type="text" class="form-control" value="<?php echo $row['ipaddress']; ?>" maxlength="15" require>
                            </div>

                            <div class="col-3">
                                <label for="editDominio" class="form-label">Dominio</label>
                                <input id="editDominio" name="editDominio" type="text" class="form-control" value="<?php echo $row['dominio']; ?>" require>
                            </div>

                            <div class="col-2">
                                <label for="editVLAN" class="form-label">VLAN</label>
                                <input id="editVLAN" name="editVLAN" type="number" maxlength="4" class="form-control" value="<?php echo $row['vlan']; ?>">
                            </div>

                            <div class="col-3">
                                <label for="editStatusVM" class="form-label">Status</label>
                                <select id="editStatusVM" name="editStatusVM" class="form-select" require>
                                    <option value="<?= $row['statusVM']; ?>"><?= $row['statusVM']; ?></option>
                                    <option value="Ativado">Ativado</option>
                                    <option value="Em Implementação">Em Implementação</option>
                                    <option value="Inativado">Inativado</option>
                                </select>
                            </div>

                            <div class="col-3">
                                <label for="editMemoria" class="form-label">Memória (Mb)*</label>
                                <input name="editMemoria" type="number" class="form-control" id="editMemoria" value="<?php echo $row['recursoMemoria']; ?>" require>
                            </div>

                            <div class="col-2">
                                <label for="editVCPU" class="form-label">vCPU*</label>
                                <input name="editVCPU" type="number" class="form-control" id="editVCPU" value="<?php echo $row['recursoCPU']; ?>" require>
                            </div>

                            <div class="col-3">
                                <label for="editDisco1" class="form-label">Disco partição 1 (Gb)*</label>
                                <input name="editDisco1" type="number" class="form-control" id="editDisco1" value="<?php echo $row['recursoDisco1']; ?>" require>
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
                                <a href="/telecom/credenciais/index.php?id=<?=$id?>&tipo=VM"><input type="button" class="btn btn-info" value="Visualizar credenciais"></input></a>
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

<?php
require "../../scripts/vms.php";
require "../../includes/footer.php";
?>