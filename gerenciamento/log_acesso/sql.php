<?php
$sql_log_acesso =
"SELECT
la.id as id,
la.horario as horario,
la.ip_address as ip_address,
p.nome as usuario
FROM
log_acesso as la
LEFT JOIN
usuarios as u
ON
u.id = la.usuario_id
LEFT JOIN
pessoas as p
ON
u.pessoa_id = p.id
order by
la.horario DESC
";