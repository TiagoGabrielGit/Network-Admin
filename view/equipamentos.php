<?php
require "../includes/menu.php";
require "../conexoes/conexao.php";
require "../sql.php";

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);

$result = "SELECT
eqp.id as id,
fab.id as idfabricante,
tipo.id as idtipo,
eqp.equipamento as equipamento,
fab.fabricante as fabricante,
eqp.criado as criado,
eqp.modificado as modificado
FROM equipamentos AS eqp
left join fabricante as fab
on fab.id = eqp.fabricante
WHERE eqp.id = '$id'";
$resultado = mysqli_query($mysqli, $result);
$row = mysqli_fetch_assoc($resultado);
?>

<main id="main" class="main">

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $row['fabricante']; ?> - <?php echo $row['equipamento']; ?> </h5>

                        <!-- Multi Columns Form -->
                        <form method="POST" action="/processa_edit/equipamentos.php" class="row g-3">
                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

                            <div class="row mb-3">
                                <label for="codigo" class="col-sm-12 col-form-label">Código</label>
                                <div class="col-sm-2">
                                    <input name="codigo" type="text" class="form-control" id="codigo" value="<?php echo $row['id']; ?>" disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="inputEquipamento" class="col-sm-12 col-form-label">Equipamento</label>
                                <div class="col-sm-4">
                                    <input name="equipamento" type="text" class="form-control" id="inputEquipamento" value="<?php echo $row['equipamento']; ?>">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <label for="inputFabricante" class="form-label">Fabricante</label>
                                <div class="col-sm-6">
                                    <select name="fabricante" class="form-select" aria-label="Default select example">
                                        <option value="<?= $row['idfabricante']; ?>"><?= $row['fabricante']; ?></option>
                                        <?php
                                        $resultado = mysqli_query($mysqli, $sql_fabricante) or die("Erro ao retornar dados");
                                        while ($c = $resultado->fetch_assoc()) : ?>
                                            <option value="<?= $c['id']; ?>"><?= $c['fabricante']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="inputTipo" class="form-label">Tipo</label>
                                <div class="col-sm-6">
                                    <select name="tipo" class="form-select" aria-label="Default select example">
                                        <option value="<?= $row['idtipo']; ?>"><?= $row['tipo']; ?></option>
                                        <?php
                                        $resultado = mysqli_query($mysqli, $sql_tipo) or die("Erro ao retornar dados");
                                        while ($c = $resultado->fetch_assoc()) : ?>
                                            <option value="<?= $c['id']; ?>"><?= $c['tipo']; ?></option>
                                        <?php endwhile; ?>
                                    </select>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <label for="dateCreated" class="form-label">Data criação</label>
                                <div class="col-sm-6">
                                    <input name="dateCreated" type="text" class="form-control" id="dateCreated" value="<?php echo $row['criado']; ?>" disabled>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="dateModified" class="form-label">última modificação</label>
                                <div class="col-sm-6">
                                    <input name="dateModified" type="text" class="form-control" id="dateModified" value="<?php echo $row['modificado']; ?>" disabled>
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                                <button type="reset" class="btn btn-secondary">Limpar</button>
                            </div>
                        </form><!-- End Multi Columns Form -->

                    </div>
                </div>
            </div>

        </div>
    </section>

</main><!-- End #main -->

<?php
require "../includes/footer.php";
?>