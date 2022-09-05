<?php
require "../../includes/menu.php";
require "../../conexoes/conexao.php";
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Tipos de Equipamentos</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item">Cadastros</li>
                <li class="breadcrumb-item active">Tipos de Equipamentos</li>
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
                                    <h5 class="card-title">Cadastro de tipos de equipamentos</h5>
                                </div>
                                <div class="col-2"></div>
                                <div class="col-2">
                                    <div class="card">
                                        <!-- Basic Modal -->
                                        <button style="margin-top: 15px" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#basicModal">
                                            Novo tipo
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="basicModal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Novo tipo de equipamento</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <!-- Vertical Form -->
                                                    <form method="POST" action="/processa_add/tipoEquipamento.php" class="row g-3">
                                                        <div class="col-12">
                                                            <label for="inputTipo" class="form-label">Tipo</label>
                                                            <input name="tipo" type="text" class="form-control" id="inputTipo">
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

                        <p>Listagem tipo de equipamentos</p>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">Tipo</th>
                                    <th style="text-align: center;" scope="col">Visualizar</th>
                                    <th style="text-align: center;" scope="col">Excluir</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Preenchendo a tabela com os dados do banco: -->
                                <?php
                                $sql = "SELECT * FROM tipoequipamento WHERE deleted = 1 ORDER BY tipo ASC";
                                $resultado = mysqli_query($mysqli, $sql) or die("Erro ao retornar dados");

                                // Obtendo os dados por meio de um loop while
                                while ($campos = $resultado->fetch_array()) {
                                    $id = $campos['id'];
                                    echo "<tr>";
                                ?>
                                    </td>
                                    <td><?php echo $campos['tipo']; ?></td>
                                    <td style="text-align: center;">
                                        <?php echo "<a href='/view/tipoEquipamento.php?id=" . $campos['id'] . "'" . "class='bi bi-eye-fill'</a>"; ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php
                                        if ($campos['cadastroDefault'] == 1) {
                                            echo "<a href='#' title='Não é possivel excluir um cadastro default' class='bi bi-file-excel-fill' ></a>";
                                        } else {
                                            echo "<a href='/processa_delete/tipoEquipamento.php?id=" . $campos['id'] . "' " . " class='bi bi-trash-fill' </a>"; 
                                        }
                                        ?>
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