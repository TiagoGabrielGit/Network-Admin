<?php
require "../../includes/menu.php";
require "../../conexoes/conexao.php";
require "sql.php";
?>


<main id="main" class="main">

    <div class="pagetitle">
        <h1>Equipamentos</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">

                    <div class="card-body">

                        <div class="container">
                            <div class="row">
                                <div class="col-10">
                                    <h5 class="card-title">Filtros de pesquisa</h5>
                                </div>

                                <div class="col-2">
                                    <div class="card">
                                        <!-- Basic Modal -->
                                        <button style="margin-top: 15px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                                            Cadastrar novo
                                        </button>
                                    </div>
                                </div>
                                <div class="modal fade" id="basicModal" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Novo cadastro</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <!-- Vertical Form -->
                                                    <form method="POST" action="processa/add.php" class="row g-3">

                                                        <div class="col-6">
                                                            <label for="cadastroEmpresa" class="form-label">Empresa</label>
                                                            <select id="cadastroEmpresa" name="cadastroEmpresa" class="form-select" require>
                                                                <option selected disabled>Selecione a empresa</option>
                                                                <?php
                                                                $resultado = mysqli_query($mysqli, $sql_lista_empresas);
                                                                while ($empresa = mysqli_fetch_object($resultado)) :
                                                                    echo "<option value='$empresa->id'> $empresa->empresa</option>";
                                                                endwhile;
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-4">
                                                            <label for="cadastroPop" class="form-label">POP</label>
                                                            <select id="cadastroPop" name="cadastroPop" class="form-select" require>
                                                                <option selected disabled>Selecione o pop</option>
                                                            </select>
                                                        </div>

                                                        <hr class="sidebar-divider">

                                                        <div class="col-4">
                                                            <label for="cadastroFabricante" class="form-label">Fabricante</label>
                                                            <select id="cadastroFabricante" name="cadastroFabricante" class="form-select" require>
                                                                <option selected disabled>Selecione o fabricante</option>
                                                                <?php
                                                                $resultado = mysqli_query($mysqli, $sql_lista_fabricantes);
                                                                while ($fabricante = mysqli_fetch_object($resultado)) :
                                                                    echo "<option value='$fabricante->id'> $fabricante->fabricante</option>";
                                                                endwhile;
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-4">
                                                            <label for="cadastroEquipamento" class="form-label">Equipamento</label>
                                                            <select id="cadastroEquipamento" name="cadastroEquipamento" class="form-select" require>
                                                                <option selected disabled>Selecione o equipamento</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-4">
                                                            <label for="cadastroTipoEquipamento" class="form-label select-label">Tipo de equipamento</label>
                                                            <select id="cadastroTipoEquipamento" name="cadastroTipoEquipamento" class="form-select" require>
                                                                <option selected disabled>Selecione o tipo</option>
                                                                <?php
                                                                $resultado = mysqli_query($mysqli, $sql_lista_tipos);
                                                                while ($tipos = mysqli_fetch_object($resultado)) :
                                                                    echo "<option value='$tipos->id'> $tipos->tipo</option>";
                                                                endwhile;
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <hr class="sidebar-divider">

                                                        <div class="col-4">
                                                            <label for="hostname" class="form-label">Hostname</label>
                                                            <input name="hostname" type="text" class="form-control" id="hostname" placeholder="Ex: sw01.POPABC" require>
                                                        </div>

                                                        <div class="col-4">
                                                            <label for="ipaddress" class="form-label">Endereço IP</label>
                                                            <input name="ipaddress" type="text" class="form-control" id="ipaddress" placeholder="Ex:192.168.001.010" require>
                                                        </div>

                                                        <div class="col-4">
                                                            <label for="statusEquipamento" class="form-label">Status</label>
                                                            <select id="statusEquipamento" name="statusEquipamento" class="form-select" require>
                                                                <option selected disabled>Selecione o status</option>>
                                                                <option value="Ativado">Ativado</option>
                                                                <option value="Em Implementação">Em Implementação</option>
                                                                <option value="Inativado">Inativado</option>
                                                            </select>
                                                        </div>

                                                        <div class="col-6">
                                                            <label for="anotacaoEquipamento" class="form-label">Anotações</label>
                                                            <textarea id="anotacaoEquipamento" name="anotacaoEquipamento" class="form-control" rows="5"></textarea>
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

                        <form method="POST" action="processa/add.php" class="row g-3">

                            <div class="col-4">
                                <label for="selecionaEmpresa" class="form-label">Empresa*</label>
                                <select id="selecionaEmpresa" name="selecionaEmpresa" class="form-select">
                                    <option selected disabled>Selecione a empresa</option>
                                    <?php
                                    $resultado = mysqli_query($mysqli, $sql_lista_empresas);
                                    while ($empresa = mysqli_fetch_object($resultado)) :
                                        echo "<option value='$empresa->id'> $empresa->empresa</option>";
                                    endwhile;
                                    ?>
                                </select>
                            </div>

                            <div class="col-3">
                                <label for="listaPop" class="form-label">POP</label>
                                <select id="listaPop" name="listaPop" class="form-select">
                                    <option selected disabled>Selecione o pop</option>
                                </select>
                            </div>

                            <div class="col-2">
                                <label for="ipaddress" class="form-label">Endereço IP</label>
                                <input name="ipaddress" type="text" class="form-control" id="ipaddress" placeholder="Ex:192.168.001.010">
                            </div>

                            <div class="col-3">
                                <label for="hostname" class="form-label">Hostname</label>
                                <input name="hostname" type="text" class="form-control" id="hostname">
                            </div>

                            <div class="col-4">
                                <label for="tipoEquipamento" class="form-label select-label">Tipo de equipamento</label>
                                <select id="tipoEquipamento" name="tipoEquipamento" class="form-select" multiple>
                                    <?php
                                    $resultado = mysqli_query($mysqli, $sql_lista_tipos);
                                    while ($tipos = mysqli_fetch_object($resultado)) :
                                        echo "<option value='$tipos->id_tipo'> $tipos->tipo</option>";
                                    endwhile;
                                    ?>
                                </select>
                            </div>

                            <div class="col-4">
                                <label for="fabricante" class="form-label">Fabricante</label>
                                <select id="fabricante" name="fabricante" class="form-select">
                                    <option selected disabled>Selecione o fabricante</option>
                                    <?php
                                    $resultado = mysqli_query($mysqli, $sql_lista_fabricantes);
                                    while ($fabricante = mysqli_fetch_object($resultado)) :
                                        echo "<option value='$fabricante->id'> $fabricante->fabricante</option>";
                                    endwhile;
                                    ?>
                                </select>
                            </div>

                            <div class="col-4">
                                <label for="equipamento" class="form-label">Equipamento</label>
                                <select id="equipamento" name="equipamento" class="form-select">
                                    <option selected disabled>Selecione o equipamento</option>
                                </select>
                            </div>

                            <div class="col-6">
                                <button style="margin-top: 15px; " type="button" class="btn btn-primary">Buscar</button>
                            </div>

                        </form>

                        <hr class="sidebar-divider">



                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" scope="col">Empresa</th>
                                    <th style="text-align: center;" scope="col">POP</th>
                                    <th style="text-align: center;" scope="col">Hostname</th>
                                    <th style="text-align: center;" scope="col">Endereço IP</th>
                                    <th style="text-align: center;" scope="col">Equipamento</th>
                                    <th style="text-align: center;" scope="col">Status</th>
                                    <th style="text-align: center;" scope="col">Visualizar</th>
                                    <th style="text-align: center;" scope="col">Credenciais</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Preenchendo a tabela com os dados do banco: -->
                                <?php
                                $resultado = mysqli_query($mysqli, $sql_lista_EquipamentosPop) or die("Erro ao retornar dados");

                                // Obtendo os dados por meio de um loop while
                                while ($campos = $resultado->fetch_array()) {
                                    $id = $campos['id_equipop'];
                                    echo "<tr>";
                                ?>
                                    </td>
                                    <td style="text-align: center;"><?php echo $campos['empresa']; ?></td>
                                    <td style="text-align: center;"><?php echo $campos['pop']; ?></td>
                                    <td style="text-align: center;"><?php echo $campos['hostname']; ?></td>
                                    <td style="text-align: center;"><?php echo $campos['ipaddress']; ?></td>
                                    <td style="text-align: center;"><?php echo $campos['equipamento']; ?></td>
                                    <td style="text-align: center;" style="text-align: center;"><?php echo $campos['statuseqp']; ?></td>
                                    <td style="text-align: center;">
                                        <?php echo "<a href='view.php?id=" . $campos['id_equipop'] . "'" . "class='bi bi-eye-fill'</a>"; ?>
                                    </td>
                                    <td style="text-align: center;">
                                        <?php echo "<a href='view.php?id=" . $campos['id_equipop'] . "'" . "class='bi bi-key-fill'</a>"; ?>
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
require "../../scripts/equipamentosPop.php";
require "../../includes/footer.php";
?>