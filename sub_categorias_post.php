<?php
require "conexoes/conexao.php";
require "sql.php";

$id_categoria = $_REQUEST['id_categoria'];

$resultado_sub_cat = mysqli_query($mysqli, $sql_pesquisa_estados);

while ($row_sub_cat = mysqli_fetch_assoc($resultado_sub_cat)) {
    $sub_categorias_post[] = array(
        'id'    => $row_sub_cat['id'],
        'nome_sub_categoria' => utf8_encode($row_sub_cat['estado']),
    );
}

echo (json_encode($sub_categorias_post));
