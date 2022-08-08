<?php
session_start();
require "../../../conexoes/conexao.php";

$usuario_id = $_SESSION['id'];

$sql_pessoa =
    "SELECT
p.id as id_pessoa
FROM
usuarios as u
LEFT JOIN
pessoas as p
ON
p.id = u.pessoa_id
WHERE
u.id = '$usuario_id'
";

$result_pessoa = mysqli_query($mysqli, $sql_pessoa);
$pessoa = mysqli_fetch_assoc($result_pessoa);
$pessoa_id = $pessoa['id_pessoa'];
?>

<?php
require "../../../conexoes/conexao_pdo.php";

$id_empresa = $_POST['idEmpresa1'];
$tipo = "equipamento";
$privacidade = $_POST['cadastroPrivacidade'];
$id_Equipamento = $_POST['idSenha2'];
$equipamento_desc = $_POST['equipamentoDescricao'];
$equipamento_user = $_POST['equipamentoUsuario'];
$equipamento_pass = $_POST['equipamentoSenha'];

$cont_insert1 = false;

$credenciais_equipamento = "INSERT INTO credenciais_equipamento (empresa_id, tipo, usuario_id, privacidade, equipamento_id, equipamentodescricao, equipamentousuario, equipamentosenha, active)
                    VALUES (:empresa_id, :tipo, :usuario_id, :privacidade, :id_Equipamento, :equipamento_desc, :equipamento_user, :equipamento_pass, '1')";
$stmt1 = $pdo->prepare($credenciais_equipamento);
$stmt1->bindParam(':empresa_id', $id_empresa);
$stmt1->bindParam(':tipo', $tipo);
$stmt1->bindParam(':usuario_id', $pessoa_id);
$stmt1->bindParam(':privacidade', $privacidade);
$stmt1->bindParam(':id_Equipamento', $id_Equipamento);
$stmt1->bindParam(':equipamento_desc', $equipamento_desc);
$stmt1->bindParam(':equipamento_user', $equipamento_user);
$stmt1->bindParam(':equipamento_pass', $equipamento_pass);

if ($stmt1->execute()) {
    $cont_insert1 = true;
} else {
    $cont_insert1 = false;
}


if ($cont_insert1) {
    echo "<p style='color:green;'>Cadastrado com Sucesso</p>";
} else {
    echo "<p style='color:red;'>Erro ao cadastrar</p>";
}
