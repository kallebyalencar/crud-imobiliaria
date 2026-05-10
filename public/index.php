<?php 
session_start(); 

require_once '../config.php/database.php';

$request = $_SERVER['REQUEST_URI']; // Captura a URL solicitada
$basePath = '/tde-backend/crud-imobiliaria/public'; // É o caminho base do projeto
$route = str_replace($basePath, '', $request); // Remove o caminho base da URL
$route = strtok($route, '?'); // Remove os parâmetros da URL

require_once '../routes/web.php'; 

?>