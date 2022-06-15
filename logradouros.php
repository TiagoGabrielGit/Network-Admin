<?php
require "includes/cadastros_navbar.php";
require "conexoes/conexao.php";
require "sql.php";

$pais = mysqli_query($mysqli, $sql_pais);
$estado = mysqli_query($mysqli, $sql_estados);
$cidade = mysqli_query($mysqli, $sql_cidade);
$bairro = mysqli_query($mysqli, $sql_bairros);

?>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Logradouros</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item">Cadastros</li>
                <li class="breadcrumb-item active">Logradouros</li>
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
                                    <h5 class="card-title">Cadastro de logradouros</h5>
                                </div>

                                <div class="col-4">
                                    <div class="card">
                                        <!-- Basic Modal -->
                                        <button style="margin-top: 15px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                                            Novo logradouro
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="basicModal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Novo logradouro</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <!-- Vertical Form -->
                                                    <form method="POST" action="/processa_add/logradouro.php" class="row g-3">

                                                        <div class="col-12">
                                                            <label for="inputPais" class="form-label">País</label>
                                                            <select name="id_categoria" id="id_categoria" class="form-select" aria-label="Default select example">
                                                                <option selected disabled>Selecione o pais</option>
                                                                <?php
                                                                while ($p = $pais->fetch_assoc()) : ?>
                                                                    <option value="<?= $p['id']; ?>"><?= $p['pais']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="inputEstado" class="form-label">Estado</label>
                                                            <span class="carregando">Aguarde, carregando...</span>
                                                            <select name="id_sub_categoria" id="id_sub_categoria" class="form-select" aria-label="Default select example">
                                                                <option value="">Escolha o estado</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="inputEstado" class="form-label">Estado</label>
                                                            <select name="estado" class="form-select" aria-label="Default select example">
                                                                <option selected disabled>Selecione o estado</option>
                                                                <?php
                                                                while ($e = $estado->fetch_assoc()) : ?>
                                                                    <option value="<?= $e['id']; ?>"><?= $e['estado']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="inputCidade" class="form-label">Cidade</label>
                                                            <select name="cidade" class="form-select" aria-label="Default select example">
                                                                <option selected disabled>Selecione a cidade</option>
                                                                <?php
                                                                while ($c = $cidade->fetch_assoc()) : ?>
                                                                    <option value="<?= $c['id']; ?>"><?= $c['cidade']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="inputBairro" class="form-label">Bairro</label>
                                                            <select name="bairro" class="form-select" aria-label="Default select example">
                                                                <option selected disabled>Selecione o bairro</option>
                                                                <?php
                                                                while ($b = $bairro->fetch_assoc()) : ?>
                                                                    <option value="<?= $b['id']; ?>"><?= $b['bairro']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="inputLogradouro" class="form-label">Logradouro</label>
                                                            <input name="logradouro" type="text" class="form-control" id="inputLogradouro">
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="inputCEP" class="form-label">CEP</label>
                                                            <input name="cep" type="text" class="form-control" id="inputCEP">
                                                        </div>

                                                        <div class="text-center">
                                                            <button type="submit" class="btn btn-primary">Salvar</button>
                                                            <button type="reset" class="btn btn-secondary">Limpar</button>
                                                        </div>
                                                    </form><!-- Vertical Form -->

                                                    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
                                                    <script type="text/javascript">
                                                        google.load("jquery", "1.4.2");
                                                    </script>

                                                    <script type="text/javascript">
                                                        $(function() {
                                                            $('#id_categoria').change(function() {
                                                                if ($(this).val()) {
                                                                    $('#id_sub_categoria').hide();
                                                                    $('.carregando').show();
                                                                    $.getJSON('sub_categorias_post.php?search=', {
                                                                        id_categoria: $(this).val(),
                                                                        ajax: 'true'
                                                                    }, function(j) {
                                                                        var options = '<option value="">Escolha Subcategoria</option>';
                                                                        for (var i = 0; i < j.length; i++) {
                                                                            options += '<option value="' + j[i].id + '">' + j[i].nome_sub_categoria + '</option>';
                                                                        }
                                                                        $('#id_sub_categoria').html(options).show();
                                                                        $('.carregando').hide();
                                                                    });
                                                                } else {
                                                                    $('#id_sub_categoria').html('<option value="">– Escolha Subcategoria –</option>');
                                                                }
                                                            });
                                                        });
                                                    </script>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End Basic Modal-->

                            </div>

                        </div>

                        <p>Listagem de logradouros</p>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Bairro</th>
                                    <th scope="col">Logradouro</th>
                                    <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Preenchendo a tabela com os dados do banco: -->
                                <?php
                                $resultado = mysqli_query($mysqli, $sql_logradouros) or die("Erro ao retornar dados");

                                // Obtendo os dados por meio de um loop while
                                while ($campos = $resultado->fetch_array()) {
                                    $id = $campos['id'];
                                    echo "<tr>";
                                ?>
                                    </td>
                                    <td><?php echo $campos['id']; ?></td>
                                    <td><?php echo $campos['cidade']; ?></td>
                                    <td><?php echo $campos['bairro']; ?></td>
                                    <td><?php echo $campos['logradouro']; ?></td>
                                    <td>
                                        <?php echo "<a href='view/logradouros.php?id=" . $campos['id'] . "'" . "class='bi bi-eye-fill'</a>"; ?>
                                        <?php echo "<a href='processa_delete/logradouros.php?id=" . $campos['id'] . "' data-confirm='Tem certeza que deseja excluir permanentemente esse registro?'" . " class='bi bi-trash-fill' </a>"; ?>
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