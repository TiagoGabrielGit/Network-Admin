<?php
require $_SERVER['DOCUMENT_ROOT'] . "/conexoes/conexao_pdo.php";

$idEquipe = $_GET["idEquipe"];
$idCredencial = $_GET["idCredencial"];

$cont_insert = false;

$insert_permissao_equipe = "INSERT INTO credenciais_equipamento_privacidade_equipe (credencial_id, equipe_id) 
                            VALUES (:idCredencial, :idEquipe)";
$stmt1 = $pdo->prepare($insert_permissao_equipe);
$stmt1->bindParam(':idCredencial', $idCredencial);
$stmt1->bindParam(':idEquipe', $idEquipe);

if ($stmt1->execute()) {
    $cont_insert = true;
} else {
    $cont_insert = false;
}