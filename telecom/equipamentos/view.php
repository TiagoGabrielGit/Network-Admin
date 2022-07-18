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
eqpop.anotacaoEquipamento as anotacaoEquipamento,
eqpop.statusEquipamento as eqpopstatus,
emp.fantasia as nome_empresa,
emp.id as id_empresa,
pop.pop as nome_pop,
eqp.id as id_equipamento,
eqp.equipamento as nome_equipamento,
fab.id as id_fabricante,
fab.fabricante as nome_fabricante,
tipo.id as id_tipoEquipamento,
tipo.tipo as nome_tipoEquipamento
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
WHERE
eqpop.id = '$id'
";

$resultado = mysqli_query($mysqli, $sql_sql_equipamentopop);
$row = mysqli_fetch_assoc($resultado);

?>

<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Código <?php echo $row['id_equipamentoPop']; ?> - <?php echo $row['hostname'];?></h5>

                        <form method="POST" action="processa/edit.php" class="row g-3">

                            <input name="id" type="text" class="form-control" id="id" value="<?php echo $row['id_equipamentoPop']; ?>" hidden>

                            <div class="col-6">
                                <label for="inputEmpresa" class="form-label">Empresa*</label>
                                <select id="inputEmpresa" name="inputEmpresa" class="form-select" require>
                                    <option value="<?= $row['id_empresa']; ?>"><?= $row['nome_empresa']; ?></option>
                                    <?php
                                    $resultado = mysqli_query($mysqli, $sql_lista_empresas);
                                    while ($emp = $resultado->fetch_assoc()) : ?>
                                        <option value="<?= $emp['id']; ?>"><?= $emp['empresa']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="col-2">
                                <label for="inputPop" class="form-label">POP*</label>
                                <select id="inputPop" name="inputPop" class="form-select" value="<?php echo $row['nome_pop']; ?>" require>
                                    <option value="<?= $row['id_pop']; ?>"><?= $row['nome_pop']; ?></option>
                                    <?php
                                    $resultado = mysqli_query($mysqli, $sql_lista_pop);
                                    while ($c = $resultado->fetch_assoc()) : ?>
                                        <option value="<?= $c['id_pop']; ?>"><?= $c['nome_pop']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="col-4">
                                <label for="inputHostname" class="form-label">Hostname*</label>
                                <input name="inputHostname" type="text" class="form-control" id="inputHostname" value="<?php echo $row['hostname']; ?>" require>
                            </div>

                            <hr class="sidebar-divider">

                            <div class="col-4">
                                <label for="inputFabricante" class="form-label">Fabricante*</label>
                                <select id="inputFabricante" name="inputFabricante" class="form-select" value="<?php echo $row['nome_cidade']; ?>" require>
                                    <option value="<?= $row['id_fabricante']; ?>"><?= $row['nome_fabricante']; ?></option>
                                    <?php
                                    $resultado = mysqli_query($mysqli, $sql_lista_fabricantes);
                                    while ($c = $resultado->fetch_assoc()) : ?>
                                        <option value="<?= $c['id']; ?>"><?= $c['fabricante']; ?></option>
                                    <?php endwhile; ?>
                                </select>
                            </div>

                            <div class="col-4">
                                <label for="inputEquipamento" class="form-label">Equipamento*</label>
                                <select id="inputEquipamento" name="inputEquipamento" class="form-select" require>
                                    <option value="<?= $row['id_equipamento']; ?>"><?= $row['nome_equipamento']; ?></option>
                                </select>
                            </div>

                            <div class="col-4">
                                <label for="inputTipoEquipamento" class="form-label select-label">Tipo de equipamento*</label>
                                <select id="inputTipoEquipamento" name="inputTipoEquipamento" class="form-select" require>
                                    <option value="<?= $row['id_tipoEquipamento']; ?>"><?= $row['nome_tipoEquipamento']; ?></option>

                                </select>
                            </div>

                            <div class="col-4">
                                <label for="inputIpAddress" class="form-label">Endereço IP*</label>
                                <input name="inputIpAddress" type="text" class="form-control" id="inputIpAddress" value="<?php echo $row['ipaddress']; ?>" maxlength="15" require>
                            </div>
 

                            <div class="col-4">
                                <label for="inputStatus" class="form-label select-label">Status*</label>
                                <select id="inputStatus" name="inputStatus" class="form-select" require>
                                    <option value="<?= $row['eqpopstatus']; ?>"><?= $row['eqpopstatus']; ?></option>
                                    <option value="Ativado">Ativado</option>
                                    <option value="Em Implementação">Em Implementação</option>
                                    <option value="Inativado">Inativado</option>
                                </select>
                            </div>

                            <hr class="sidebar-divider">

                            <div class="col-12">
                                <label for="anotacaoEquipamento" class="form-label">Anotações</label>
                                <textarea id="anotacaoEquipamento" name="anotacaoEquipamento" class="form-control" maxlength="10000" rows="10"><?php echo $row['anotacaoEquipamento'] ?></textarea>
                            </div>

                            <div class="text-center">
                                <button name="salvar" type="submit" class="btn btn-primary">Salvar</button>
                                <a href="/telecom/equipamentos/index.php"><input type="button" value="Voltar" class="btn btn-secondary"></a>
                            </div>
                        </form><!-- Vertical Form -->

                    </div>
                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->

<?php
require "../../scripts/equipamentosPop.php";
require "../../includes/footer.php";
?>