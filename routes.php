<?php
define('FOLDER','/lp2/api/'); // cria a constante caminho padrão
$url = $_SERVER['REQUEST_URI']; // pega o que está na url
$lengthStrFolder = strlen(FOLDER); // guarda o tamanho da constante folder
$urlClean = substr($url, $lengthStrFolder); // separa a string por partes

$route = explode('/', $urlClean);

//carrega autoloaders
require ('helpers/autoloader.php');

if($route[0] == 'user'){
    require('controllers/UserController.php');
} elseif($route[0] == 'produto'){
    require('controllers/ProdutoController.php');
}else {
    $result['message'] = '404 - Rota Api Não Encontrada';
    $response = new Output();
    $response ->out($result, 404);
}
?>