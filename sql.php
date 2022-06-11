<?php
require "protect.php";

$sql_equipamentos =
"SELECT
eqp.id as id,
eqp.equipamento as equipamento,
fab.fabricante as fabricante,
tipo.tipo as tipo
FROM equipamentos AS eqp
left join fabricante as fab
on fab.id = eqp.fabricante
left join tipoequipamento as tipo
on tipo.id = eqp.tipo
WHERE eqp.deleted = 0
ORDER BY eqp.equipamento ASC
";

$sql_fabricante =
"SELECT
fab.*
FROM fabricante as fab
WHERE fab.deleted = 0
ORDER BY fab.fabricante
";

$sql_tipo =
"SELECT
tipo.*
FROM tipoequipamento as tipo
WHERE tipo.deleted = 0
ORDER BY tipo.tipo
";

$sql_cidade =
"SELECT
cidade.id as id,
cidade.cidade as cidade,
estado.estado as estado,
pais.pais as pais,
cidade.criado as criado,
cidade.modificado as modificado,
pais.id as idpais,
estado.id as idestado
FROM cidades as cidade
LEFT JOIN estado as estado
ON cidade.estado = estado.id
LEFT JOIN pais as pais
ON cidade.pais = pais.id
WHERE cidade.deleted = 0
ORDER BY cidade.cidade
";

$sql_bairros =
"SELECT
bairro.id as id,
bairro.bairro as bairro,
bairro.criado as criado,
bairro.modificado as modificado,
cidade.cidade as cidade,
cidade.id as idcidade
FROM bairros as bairro
LEFT JOIN cidades as cidade
ON cidade.id = bairro.cidade
WHERE bairro.deleted = 0
ORDER BY 
cidade.cidade ASC,
bairro.bairro ASC
";

$sql_estados =
"SELECT
estado.id as id,
estado.estado as estado,
estado.criado as criado,
estado.modificado as modificado,
pais.pais as pais,
pais.id as idpais
FROM estado as estado
LEFT JOIN pais as pais
ON pais.id = estado.pais
WHERE estado.deleted = 0
ORDER BY 
pais.pais ASC,
estado.estado ASC
";

$sql_pais =
"SELECT
pais.*
FROM pais as pais
WHERE pais.deleted = 0
ORDER BY pais.pais
"; 