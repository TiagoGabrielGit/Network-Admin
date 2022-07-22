<?php
$sql_pesquisa_vm =
    ("SELECT
emp.fantasia as emp_fant,
vm.id as cred_id,
CASE
    WHEN vm.tipo = 'vm' THEN 'VM'
END as cred_tipo,
vm.vmdescricao as cred_desc,
listavm.hostname as cred_hostname,
vm.vmusuario as cred_usuario,
CASE
    WHEN vm.privacidade = 1 THEN 'Público'
    WHEN vm.privacidade = 2 THEN 'Equipe'
    WHEN vm.privacidade = 3 THEN 'Somente eu'
END as cred_priv
FROM
credenciais_vms as vm
LEFT JOIN
empresas as emp
ON
vm.empresa_id = emp.id
LEFT JOIN
vms as listavm
ON
vm.vm_id = listavm.id
WHERE
vm.tipo LIKE '$varTipo'
and
vm.empresa_id LIKE '$varEmpresa'
and
vm.vmdescricao LIKE '%$varDescricao%'
and
vm.vm_id LIKE '$id_vm'
and
listavm.hostname LIKE '%$varEquipamentoVM%'
");


$resultado_vm = mysqli_query($mysqli, $sql_pesquisa_vm) or die("Erro ao retornar dados");

while ($campos_vm = $resultado_vm->fetch_array()) {
    $id = $campos_vm['cred_id'];
    echo "<tr>";
?>
    </td>
    <td style="text-align: center;"><?= $campos_vm['emp_fant']; ?></td>
    <td style="text-align: center;"><?= $campos_vm['cred_tipo']; ?></td>
    <td style="text-align: center;">
        <?php
        if (empty($campos_vm['cred_hostname'])) {
            echo "Não localizado";
        } else {
            echo $campos_vm['cred_hostname'];
        }
        ?>
    </td>
    <td style="text-align: center;"><?= $campos_vm['cred_desc']; ?></td>
    <td style="text-align: center;"><?= $campos_vm['cred_usuario']; ?></td>
    <td style="text-align: center;"><?= $campos_vm['cred_priv']; ?></td>
    <td style="text-align: center;">
        <a class="bi bi-eye-fill" href="view.php?id=<?= $campos_vm['cred_id']; ?>&tipo=<?= $campos_vm['cred_tipo']; ?>"></a>
    </td>
    </tr>
<?php } ?>