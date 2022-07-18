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
eqp.equipamento_id LIKE '$varEmpresa'
and
eqp.equipamentodescricao LIKE '%$varDescricao%'
");

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
    WHEN portal.privacidade = 2 THEN 'Equipe'
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
");

$sql_lista_empresas =
    "SELECT
emp.id as id,
emp.fantasia as empresa
FROM
empresas as emp
WHERE
emp.deleted = 1
ORDER BY
emp.fantasia ASC
";
