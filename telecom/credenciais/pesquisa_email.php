<?php

$sql_pesquisa_email =
    ("SELECT
emp.fantasia as emp_fant,
email.id as cred_id,
CASE
    WHEN email.tipo = 'email' THEN 'E-mail'
END as cred_tipo,
email.emaildescricao as cred_desc,
email.emailusuario as cred_usuario,
CASE
    WHEN email.privacidade = 1 THEN 'Público'
    WHEN email.privacidade = 2 THEN 'Equipe'
    WHEN email.privacidade = 3 THEN 'Somente eu'
END as cred_priv
FROM
credenciais_email as email
LEFT JOIN
empresas as emp
ON
email.empresa_id = emp.id
WHERE
email.tipo LIKE '$varTipo'
and
email.empresa_id LIKE '$varEmpresa'
and
email.emaildescricao LIKE '%$varDescricao%'
");

$resultado_email = mysqli_query($mysqli, $sql_pesquisa_email) or die("Erro ao retornar dados");

while ($campos_email = $resultado_email->fetch_array()) {
    $id = $campos_email['cred_id'];
    echo "<tr>";
?>
    </td>
    <td style="text-align: center;"><?= $campos_email['emp_fant']; ?></td>
    <td style="text-align: center;"><?= $campos_email['cred_tipo']; ?></td>
    <td style="text-align: center;"><?= "-" ?></td>
    <td style="text-align: center;"><?= $campos_email['cred_desc']; ?></td>
    <td style="text-align: center;"><?= $campos_email['cred_usuario']; ?></td>
    <td style="text-align: center;"><?= $campos_email['cred_priv']; ?></td>
    <td style="text-align: center;">
        <a class='bi bi-eye-fill' href="view.php?id=<?= $campos_email['cred_id']; ?>&tipo=<?= $campos_email['cred_tipo']; ?>"> </a>
    </td>
    </tr>
<?php } ?>