<?php

$sql_pesquisa_portal =
    ("SELECT
emp.fantasia as emp_fant,
portal.id as cred_id,
CASE
    WHEN portal.tipo = 'portal' THEN 'Portal'
END as cred_tipo,
portal.portaldescricao as cred_desc,
portal.portalusuario as cred_usuario,
CASE
    WHEN portal.privacidade = 1 THEN 'Público'
    WHEN portal.privacidade = 2 THEN 'Privado'
    WHEN portal.privacidade = 3 THEN 'Somente eu'
END as cred_priv
FROM
credenciais_portal as portal
LEFT JOIN
empresas as emp
ON
portal.empresa_id = emp.id
WHERE
portal.tipo LIKE '$varTipo'
and
portal.empresa_id LIKE '$varEmpresa'
and
portal.portaldescricao LIKE '%$varDescricao%'
");


$resultado_portal = mysqli_query($mysqli, $sql_pesquisa_portal) or die("Erro ao retornar dados");

while ($campos_portal = $resultado_portal->fetch_array()) {
    $id = $campos_portal['cred_id']; ?>

    <tr id="tabelaLista" onclick="location.href='view.php?id=<?= $id ?>&tipo=Portal'">
        </td>
        <td style="text-align: center;"><?= $campos_portal['emp_fant']; ?></td>
        <td style="text-align: center;"><?= $campos_portal['cred_tipo']; ?></td>
        <td style="text-align: center;"><?= $campos_portal['cred_desc']; ?></td>
        <td style="text-align: center;"><?= $campos_portal['cred_usuario']; ?></td>
        <td style="text-align: center;"><?= $campos_portal['cred_priv']; ?></td>
    </tr>
<?php } ?>