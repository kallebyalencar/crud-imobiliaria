<?php 
session_start(); 

require_once '../config/database.php';

$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Captura a URL solicitada
$basePath = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'])), '/');
if ($basePath === '') {
    $basePath = '/';
}
define('BASE_URL', $basePath === '/' ? '' : $basePath);

$route = preg_replace('#^' . preg_quote($basePath, '#') . '#', '', $request);
$route = strtok($route, '?'); // Remove os parâmetros da URL
$route = '/' . trim($route, '/');
if ($route === '/.') {
    $route = '/';
}

require_once '../routes/web.php'; 

?>
