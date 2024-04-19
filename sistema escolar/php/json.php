<?php

include_once('config.php');

$stmt = $conexao->query('SELECT COUNT(id) AS  TotalUsuarios, MAX(DATE_FORMAT(ultAcesso, "%d/%m/%Y %H:%i")) AS UltimoAcesso FROM acessos');
$rows = $stmt->fetch_all(MYSQLI_ASSOC);
echo json_encode($rows);

?>