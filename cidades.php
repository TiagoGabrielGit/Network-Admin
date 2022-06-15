<?php
require "includes/cadastros_navbar.php";
require "conexoes/conexao.php";
require "sql.php";
?>
<main id="main" class="main">

    <div class="pagetitle">
        <h1>Cidades</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                <li class="breadcrumb-item">Cadastros</li>
                <li class="breadcrumb-item active">Cidades</li>
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
                                    <h5 class="card-title">Cadastro de Cidades</h5>
                                </div>

                                <div class="col-4">
                                    <div class="card">
                                        <!-- Basic Modal -->
                                        <button style="margin-top: 15px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                                            Nova Cidade
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="basicModal" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Nova Cidade</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <!-- Vertical Form -->
                                                    <form method="POST" action="/processa_add/cidades.php" class="row g-3">


                                                        <div class="col-12">
                                                            <label for="inputPais" class="form-label">Pais</label>
                                                            <select onchange="  estadoData = disparaAPI('estado',document.querySelector('#pais').value)" name="pais" id="pais" class="form-select" aria-label="Default select example">
                                                               
                                                                <option  selected disabled>Selecione o pais</option>
                                                                <?php
                                                                $resultado = mysqli_query($mysqli, $sql_pais) or die("Erro ao retornar dados");
                                                                while ($c = $resultado->fetch_assoc()) : ?>
                                                                    <option value="<?= $c['id']; ?>"><?= $c['pais']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="inputEstado" class="form-label">Estado</label>
                                                            <select onclick="validaEstado()" name="estado" class="form-select" aria-label="Default select example">
                                                                <option selected disabled>Selecione o estado</option>
                                                                <?php
                                                                $resultado = mysqli_query($mysqli, $sql_estados) or die("Erro ao retornar dados");
                                                                while ($c = $resultado->fetch_assoc()) : ?>
                                                                    <option  hidden value="<?= $c['id']; ?>"><?= $c['estado']; ?></option>
                                                                <?php endwhile; ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="inputCidade" class="form-label">Cidade</label>
                                                            <input name="cidade" type="text" class="form-control" id="inputCidade">
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

                        <p>Listagem de cadastro de cidades</p>

                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Cidade</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">País</th>
                                    <th scope="col">Opções</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Preenchendo a tabela com os dados do banco: -->
                                <?php
                                $resultado = mysqli_query($mysqli, $sql_cidade) or die("Erro ao retornar dados");

                                // Obtendo os dados por meio de um loop while
                                while ($campos = $resultado->fetch_array()) {
                                    $id = $campos['id'];
                                    echo "<tr>";
                                ?>
                                    </td>
                                    <td><?php echo $campos['id']; ?></td>
                                    <td><?php echo $campos['cidade']; ?></td>
                                    <td><?php echo $campos['estado']; ?></td>
                                    <td><?php echo $campos['pais']; ?></td>
                                    <td>
                                        <?php echo "<a href='view/cidades.php?id=" . $campos['id'] . "'" . "class='bi bi-eye-fill'</a>"; ?>
                                        <?php echo "<a href='processa_delete/cidades.php?id=" . $campos['id'] . "' data-confirm='Tem certeza que deseja excluir permanentemente esse registro?'" . " class='bi bi-trash-fill' </a>"; ?>
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    function disparaAPI(type,id) {


        console.log('teste'); 
        var settings = {
            "url": `http://networkacademy.com/api/cidades/index.php?type=${type}&id=${id}`,
            "method": "GET",
            "timeout": 0,
        };

      return  $.ajax(settings).done(function(response) {
            console.log(response);
        });
    }


    function validaEstado(){
        console.log(estadoData.id)

    }



</script>

<?php
require "includes/footer.php";
?>