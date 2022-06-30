<?php
require "../../includes/menu.php";
require "../../conexoes/conexao.php";
require "../../conexoes/sql.php";
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Problemas do sistema</h1>

    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">

                    <div class="card-body">


                        <div class="container">
                            <div class="row">
                                <div class="col-8">
                                    <h5 class="card-title">Problemas relatados</h5>
                                </div>

                                <div class="col-4">
                                    <div class="card">
                                        <!-- Basic Modal -->
                                        <button style="margin-top: 15px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                                            Relatar um problema
                                        </button>
                                    </div>
                                </div>

                                <div class="modal fade" id="basicModal" tabindex="-1">
                                    <div class="modal-dialog">

                                        <!--<div class="modal-content">-->
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Relatar problema</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <!-- Vertical Form -->
                                                    <form method="POST" action="/relataBug/processa/add.php" class="row g-3">

                                                        <input name="usuarioCriador" type="text" class="form-control" id="usuarioCriador" value="<?php echo $_SESSION['id']; ?>" hidden>

                                                        <div class="col-12">
                                                            <label for="tituloBug" class="form-label">Titulo</label>
                                                            <input name="tituloBug" type="text" class="form-control" id="tituloBug">
                                                        </div>

                                                        <section class="section">
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="card">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title">Relate datalhadamente</h5>
                                                                            <textarea id="descricaoBug" name="descricaoBug" class="tinymce-editor"></textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </section>

                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">Enviar</button>
                                                        </div>
                                                    </form><!-- Vertical Form -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Basic Modal-->

                            </div>

                        </div>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Situação</th>
                                    <th scope="col">BUG</th>
                                    <th scope="col">Criador</th>
                                    <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Preenchendo a tabela com os dados do banco: -->
                                <?php

                                $resultado = mysqli_query($mysqli, $sql_bug_relatados) or die("Erro ao retornar dados");

                                // Obtendo os dados por meio de um loop while
                                while ($campos = $resultado->fetch_array()) {
                                    $id = $campos['idBug'];
                                    echo "<tr>";
                                ?>
                                    </td>
                                    <td><?php echo $campos['situacao']; ?></td>
                                    <td><?php echo $campos['relataBug']; ?></td>
                                    <td><?php echo $campos['usuario']; ?></td>
                                    <td>
                                        <?php echo "<a href='/desenvolvimento.php?id=" . $campos['idBug'] . "'" . "class='bi bi-eye-fill'</a>"; ?>
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
require "../../includes/footer.php";
?>