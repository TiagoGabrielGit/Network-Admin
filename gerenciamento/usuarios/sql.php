<?php
$lista_pessoas =
"SELECT
    pess.id as pessoa_id,
    pess.nome as pessoa_nome,
    pess.email as pessoa_email
FROM
    pessoas as pess
WHERE
    pess.permiteUsuario = 1
ORDER BY
pess.nome ASC    
";

?>