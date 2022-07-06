<?php

$sql_lista_empresas = 
"SELECT
emp.id as id,
emp.fantasia as empresa
FROM
empresas as emp
WHERE
emp.deleted = 1
";

$sql_lista_so = 
"SELECT
so.id as id,
so.sistemaOperacional as so
From
sistemaOperacional as so
Where
so.deleted = 1
ORDER BY
so.sistemaOperacional ASC
";


?>