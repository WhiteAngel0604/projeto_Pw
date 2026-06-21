<?php
session_start();

header('Content-Type: application/json; charset=utf-8');

$resposta = 
  [
    'logado' => isset($_SESSION['usuario_id']),
    'tipo_usuario' => $_SESSION['tipo_usuario'] ?? null 
];

echo json_encode($resposta);
?>
