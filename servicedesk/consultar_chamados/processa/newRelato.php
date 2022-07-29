<?php
require "../../../conexoes/conexao_pdo.php";

$chamadoID = $_POST['chamadoID'];
$relatorID = $_POST['relatorID'];
$horaInicial = $_POST['startTime'];
$novoRelato = $_POST['novoRelato'];
$statusChamado = $_POST['statusChamado'];

$sql1 = "INSERT INTO chamado_relato (chamado_id, relator_id, relato, relato_hora_inicial, relato_hora_final)
        VALUES (:chamado_id, :relator_id, :relato, :relato_hora_inicial, NOW())";
$stmt1 = $pdo->prepare($sql1);
$stmt1->bindParam(':chamado_id', $chamadoID);
$stmt1->bindParam(':relator_id', $relatorID);
$stmt1->bindParam(':relato_hora_inicial', $horaInicial);
$stmt1->bindParam(':relato', $novoRelato);


if ($statusChamado == 3) {
    $data = [
        'status_id' => $_POST['statusChamado'],
        'in_execution' => 0,
        'in_execution_atd_id' => 0,
    ];

    $sql2 = "UPDATE chamados SET status_id=:status_id, in_execution=:in_execution, in_execution_atd_id=:in_execution_atd_id, in_execution_start=NULL, data_fechamento=NOW() WHERE id=$chamadoID";
    $stmt2 = $pdo->prepare($sql2);
} else {

    $data = [
        'status_id' => $_POST['statusChamado'],
        'in_execution' => 0,
        'in_execution_atd_id' => 0,
    ];

    $sql2 = "UPDATE chamados SET status_id=:status_id, in_execution=:in_execution, in_execution_atd_id=:in_execution_atd_id, in_execution_start=NULL WHERE id=$chamadoID";
    $stmt2 = $pdo->prepare($sql2);
}


if ($stmt1->execute() && $stmt2->execute($data)) {
    header("Location: /servicedesk/consultar_chamados/view.php?id=" . $chamadoID);
} else {
    header("Location: /servicedesk/consultar_chamados/view.php?id=" . $chamadoID);
}
