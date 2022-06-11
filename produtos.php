<?php
require "includes/cadastros_navbar.php";
require "conexoes/conexao.php";
require "sql.php";
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Equipamentos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item">Cadastros</li>
                <li class="breadcrumb-item active">Equipamentos</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">

                    <div class="card-body">


                        <div class="container">
                            <div class="row">
                                <div class="col-8">
                                    <h5 class="card-title">Cadastro de Equipamentos</h5>
                                </div>

                                <div class="col-4">
                                    <div class="card">
                                        <!-- Basic Modal -->
                                        <button style="margin-top: 15px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                                            Novo Equipamento
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="basicModal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Novo Equipamento</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <!-- Vertical Form -->
                                                    <form method="POST" action="/processa_add/equipamentos.php" class="row g-3">
                                                        <div class="col-12">
                                                            <label for="inputEquipamento" class="form-label">Equipamento</label>
                                                            <input name="equipamento" type="text" class="form-control" id="inputEquipamento">
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="inputFabricante" class="form-label">Fabricante</label>
                                                            <select name="fabricante" class="form-select" aria-label="Default select example">
                                                                <option selected disabled>Selecione o fabricante</option>
                                                                <?php
                                                                $resultado = mysqli_query($mysqli, $sql_fabricante) or die("Erro ao retornar dados");
                                                                while ($c = $resultado->fetch_assoc()) : ?>
                                                                    <option value="<?= $c['id']; ?>"><?= $c['fabricante']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                                        <div class="col-12">
                                                            <label for="inputTipo" class="form-label">Tipo</label>
                                                            <select name="tipo" class="form-select" aria-label="Default select example">
                                                                <option selected disabled>Selecione o tipo</option>
                                                                <?php
                                                                $resultado = mysqli_query($mysqli, $sql_tipo) or die("Erro ao retornar dados");
                                                                while ($c = $resultado->fetch_assoc()) : ?>
                                                                    <option value="<?= $c['id']; ?>"><?= $c['tipo']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>
                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                                            <button type="reset" class="btn btn-secondary">Limpar</button>
                                                        </div>
                                                    </form><!-- Vertical Form -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Basic Modal-->

                            </div>

                        </div>

                        <p>Listagem de equipamentos</p>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Equipamento</th>
                                    <th scope="col">Fabricante</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Preenchendo a tabela com os dados do banco: -->
                                <?php

                                $resultado = mysqli_query($mysqli, $sql_equipamentos) or die("Erro ao retornar dados");

                                // Obtendo os dados por meio de um loop while
                                while ($campos = $resultado->fetch_array()) {
                                    $id = $campos['id'];
                                    echo "<tr>";
                                ?>
                                    </td>
                                    <td><?php echo $campos['id']; ?></td>
                                    <td><?php echo $campos['equipamento']; ?></td>
                                    <td><?php echo $campos['fabricante']; ?></td>
                                    <td><?php echo $campos['tipo']; ?></td>
                                    <td>
                                        <?php echo "<a href='view/equipamentos.php?id=" . $campos['id'] . "'" . "class='bi bi-eye-fill'</a>"; ?>
                                        <?php echo "<a href='processa_delete/equipamentos.php?id=" . $campos['id'] . "' data-confirm='Tem certeza que deseja excluir permanentemente esse registro?'" . " class='bi bi-trash-fill' </a>"; ?>
                                    </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>

</main><!-- End #main -->
<?php
require "includes/footer.php";
?>