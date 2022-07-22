<?php

$sql_pesquisa_equipamento =
    ("SELECT
emp.fantasia as emp_fant,
eqp.id as cred_id,
CASE
    WHEN eqp.tipo = 'equipamento' THEN 'Equipamento'
END as cred_tipo,
eqpop.hostname as cred_hostname,
eqp.equipamentodescricao as cred_desc,
eqp.equipamentousuario as cred_usuario,
CASE
    WHEN eqp.privacidade = 1 THEN 'Público'
    WHEN eqp.privacidade = 2 THEN 'Equipe'
    WHEN eqp.privacidade = 3 THEN 'Somente eu'
END as cred_priv
FROM
credenciais_equipamento as eqp
LEFT JOIN
empresas as emp
ON
eqp.empresa_id = emp.id
LEFT JOIN
equipamentospop as eqpop
ON
eqpop.id = eqp.equipamento_id
WHERE
eqp.tipo LIKE '$varTipo'
and
eqp.empresa_id LIKE '$varEmpresa'
and
eqp.equipamentodescricao LIKE '%$varDescricao%'
and
eqp.equipamento_id LIKE '$id_equipamento'
and
eqpop.hostname LIKE '%$varEquipamentoVM%'
");

$resultado_equipamento = mysqli_query($mysqli, $sql_pesquisa_equipamento) or die("Erro ao retornar dados");

while ($campos_equipamento = $resultado_equipamento->fetch_array()) {
    $id = $campos_equipamento['cred_id'];
    echo "<tr>";
?>
    </td>
    <td style="text-align: center;"><?= $campos_equipamento['emp_fant']; ?></td>
    <td style="text-align: center;"><?= $campos_equipamento['cred_tipo']; ?></td>
    <td style="text-align: center;"><?= $campos_equipamento['cred_hostname']; ?></td>
    <td style="text-align: center;"><?= $campos_equipamento['cred_desc']; ?></td>
    <td style="text-align: center;"><?= $campos_equipamento['cred_usuario']; ?></td>
    <td style="text-align: center;"><?= $campos_equipamento['cred_priv']; ?></td>
    <td style="text-align: center;">
        <a class="bi bi-eye-fill" href="view.php?id=<?= $campos_equipamento['cred_id']; ?>&tipo=<?= $campos_equipamento['cred_tipo']; ?>"></a>
    </td>
    </tr>
<?php } ?>