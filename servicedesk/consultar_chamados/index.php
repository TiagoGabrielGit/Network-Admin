<?php
require "../../includes/menu.php";
require "../../conexoes/conexao.php";
require "../../conexoes/conexao_pdo.php";
require "sql1.php";

if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    $empresa_id = $_POST['empresaPesquisa'];
    $atendentePesquisa = $_POST['atendentePesquisa'];
} else {
    $empresa_id = "%";
    $atendentePesquisa = "%";
}

$lista_chamados =
    "SELECT
ch.id as id_chamado,
ch.assuntoChamado as assunto,
ch.atendente_id as id_atendente,
ch.data_abertura as dataAbertura,
ch.in_execution as inExecution,
cs.status_chamado as statusChamado,
tc.tipo as tipoChamado,
emp.fantasia as fantasia,
p.nome as atendente
FROM
chamados as ch
LEFT JOIN
empresas as emp
ON
ch.empresa_id = emp.id
LEFT JOIN
tipos_chamados as tc
ON
ch.tipochamado_id  = tc.id
LEFT JOIN
chamados_status as cs
ON
cs.id = ch.status_id
LEFT JOIN
pessoas as p
ON
p.id = ch.atendente_id
WHERE
ch.empresa_id LIKE '$empresa_id'
and
ch.atendente_id LIKE '$atendentePesquisa'
ORDER BY
ch.data_abertura DESC
";

$id_usuario = $_SESSION['id'];

$sql_captura_id_pessoa =
    "SELECT
u.pessoa_id as pessoaID
FROM
usuarios as u
WHERE
id = '$id_usuario'
";

$result_cap_pessoa = mysqli_query($mysqli, $sql_captura_id_pessoa);
$pessoaID = mysqli_fetch_assoc($result_cap_pessoa);
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>Listagem de chamados</h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">

                    <div class="card-body">

                        <div class="container">
                            <div class="row">
                                <div class="col-9">
                                    <h5 class="card-title">Filtros</h5>
                                </div>
                                <div class="col-3">
                                    <div class="card">
                                        <button style="margin-top: 15px" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                                            Abrir novo chamado
                                        </button>
                                    </div>
                                </div>

                                <div class="modal fade" id="basicModal" tabindex="-1">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Novo chamado</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="card-body">
                                                    <form id="abrirChamado" method="POST" class="row g-3">

                                                        <span id="msg"></span>

                                                        <input hidden id="solicitante" name="solicitante" value="<?= $pessoaID['pessoaID']; ?>"></input>

                                                        <div class="col-6">
                                                            <label for="empresaChamado" class="form-label">Empresa</label>
                                                            <select class="form-select" id="empresaChamado" name="empresaChamado" required>
                                                                <option disabled selected value="">Selecione a empresa</option>
                                                                <?php
                                                                $resultado = mysqli_query($mysqli, $sql_lista_empresas);
                                                                while ($tipos = mysqli_fetch_object($resultado)) :
                                                                    echo "<option value='$tipos->id_empresa'> $tipos->fantasia_empresa</option>";
                                                                endwhile;
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-6">
                                                            <label for="tipoChamado" class="form-label">Tipo de chamado</label>
                                                            <select class="form-select" id="tipoChamado" name="tipoChamado" required>
                                                                <option disabled selected value="">Selecione o tipo de chamado</option>
                                                                <?php
                                                                $resultado = mysqli_query($mysqli, $sql_lista_tipos_chamados);
                                                                while ($tipos = mysqli_fetch_object($resultado)) :
                                                                    echo "<option value='$tipos->id'> $tipos->tipo</option>";
                                                                endwhile;
                                                                ?>
                                                            </select>
                                                        </div>

                                                        <div class="col-6">
                                                            <label for="assuntoChamado" class="form-label">Assunto</label>
                                                            <input type="text" class="form-control" id="assuntoChamado" name="assuntoChamado" required>
                                                        </div>

                                                        <div class="col-12">
                                                            <label for="relatoChamado" class="form-label">Descreva a situação</label>
                                                            <textarea id="relatoChamado" name="relatoChamado" class="form-control" maxlength="1000" required></textarea>

                                                        </div>

                                                        <hr class="sidebar-divider">

                                                        <div class="col-4"></div>

                                                        <div class="col-4" style="text-align: center;">
                                                            <input id="btnSalvar" name="btnSalvar" type="button" value="Salvar" class="btn btn-primary"></input>
                                                            <a href="/servicedesk/consultar_chamados/index.php"> <input type="button" value="Voltar" class="btn btn-secondary"></input></a>
                                                        </div>

                                                        <div class="col-4"></div>
                                                    </form><!-- End Horizontal Form -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <form method="POST" action="#" class="row g-3">

                            <div class="col-4">
                                <label for="empresaPesquisa" class="form-label">Empresa</label>
                                <select id="empresaPesquisa" name="empresaPesquisa" class="form-select">
                                    <option selected value="%">Todas</option>
                                    <?php
                                    $resultado = mysqli_query($mysqli, $sql_lista_empresas);

                                    while ($empresa = mysqli_fetch_object($resultado)) :
                                        echo "<option value='$empresa->id_empresa'> $empresa->fantasia_empresa</option>";
                                    endwhile;

                                    if ($_SERVER["REQUEST_METHOD"] == 'POST') :

                                    ?>
                                        <script>
                                            let nomeEmpresa = '<?= $_POST['empresaPesquisa']; ?>'
                                            if (nomeEmpresa == '%') {} else {
                                                document.querySelector("#empresaPesquisa").value = nomeEmpresa
                                            }
                                        </script>
                                    <?php
                                    endif;
                                    ?>
                                </select>
                            </div>

                            <div class="col-4">
                                <label for="atendentePesquisa" class="form-label">Atendente</label>
                                <select id="atendentePesquisa" name="atendentePesquisa" class="form-select">
                                    <option selected value="%">Todos</option>
                                    <option value="1">Minhas</option>
                                    <option value="0">Sem atendente</option>


                                    <?php if ($_SERVER["REQUEST_METHOD"] == 'POST') : ?>
                                        <script>
                                            let atendentePesquisa = '<?= $_POST['atendentePesquisa']; ?>'
                                            if (atendentePesquisa == '%') {} else {
                                                document.querySelector("#atendentePesquisa").value = atendentePesquisa
                                            }
                                        </script>
                                    <?php
                                    endif;
                                    ?>

                                </select>
                            </div>

                            <div class="col-6">
                                <button style="margin-top: 30px; " type="submit" class="btn btn-primary">Filtrar</button>
                            </div>

                        </form>

                        <hr class="sidebar-divider">

                        <style>
                            #tabelaListaNotExecution:hover {
                                cursor: pointer;
                                background-color: #E0FFFF;
                            }
                        </style>

                        <style>
                            #tabelaListaInExecution:hover {
                                cursor: pointer;
                                background-color: #66CDAA;
                            }
                        </style>

                        <style>
                            .playColor {
                                background-color: #98FB98;
                            }
                        </style>

                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th style="text-align: center;" scope="col">Número</th>
                                    <th style="text-align: center;" scope="col">Empresa</th>
                                    <th style="text-align: center;" scope="col">Tipo chamado</th>
                                    <th style="text-align: center;" scope="col">Assunto</th>
                                    <th style="text-align: center;" scope="col">Atendente</th>
                                    <th style="text-align: center;" scope="col">Data abertura</th>
                                    <th style="text-align: center;" scope="col">Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $resultado = mysqli_query($mysqli, $lista_chamados) or die("Erro ao retornar dados");
                                while ($campos = $resultado->fetch_array()) {
                                    $id = $campos['id_chamado']; ?>


                                    <?php
                                    if ($campos['inExecution'] == 1) {
                                        $classeColor = "playColor";
                                        $tabelaLista = "tabelaListaInExecution";
                                    } else {
                                        $classeColor = "";
                                        $tabelaLista = "tabelaListaNotExecution";
                                    }
                                    ?>

                                    <tr class="<?= $classeColor ?>" id="<?= $tabelaLista ?>" onclick="location.href='view.php?id=<?= $campos['id_chamado']; ?>'">
                                        <?php
                                        if (empty($campos['atendente'])) {
                                            $atendente = "Sem atendente";
                                        } else {
                                            $atendente = $campos['atendente'];
                                        }
                                        ?>
                                        </td>
                                        <td style="text-align: center;"><?= $campos['id_chamado']; ?></td>
                                        <td style="text-align: center;"><?= $campos['fantasia']; ?></td>
                                        <td style="text-align: center;"><?= $campos['tipoChamado']; ?></td>
                                        <td style="text-align: center;"><?= $campos['assunto']; ?></td>
                                        <td style="text-align: center;"><?= $atendente ?></td>
                                        <td style="text-align: center;"><?= $campos['dataAbertura']; ?></td>
                                        <td style="text-align: center;"><?= $campos['statusChamado']; ?></td>
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
require "../../scripts/abrir_chamado.php";
require "../../includes/footer.php";
?>