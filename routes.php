<?php
require('config.php'); 
// cria a constante caminho padrão
$url = $_SERVER['REQUEST_URI']; // pega o que está na url
$lengthStrFolder = strlen(BASE_URL_API); // guarda o tamanho da constante folder
$urlClean = substr($url, $lengthStrFolder); // separa a string por partes
$routeWithouthParameters = explode('?', $urlClean);
$route = explode('/', $routeWithouthParameters[0]);

//carrega autoloaders
require(HELPERS_FOLDER.'autoloader.php');

//Cria objeto de resposta da api
$response = new Output();

if(!isset($route[0]) || !isset($route[1])){
    $result['message'] = '404 - Api Not Found.';
    $response ->out($result, 404);
}

$controller_name = $route[0];
$action = str_replace('-','',$route[1]);
//Checa se o controller existe

$controller_path = CONTROLLERS_FOLDER.$route[0].'Controller.php';
//Checa se o arquivo do controller existe
if(file_exists($controller_path)){
    $controller_class_name = $controller_name . "Controller";
    $controller = new $controller_class_name();
    //Checa se a action do controller existe
    if(method_exists($controller,$action)){
        $controller->$action();
    }
}
    $result['message'] = '404 - Rota Api Não Encontrada';
    $response ->out($result, 404);
?>