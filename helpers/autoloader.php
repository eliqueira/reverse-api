<?php
function myLoarders($class_name){
    if(file_exists('models/' . $class_name . '.php')){
        require 'models/' . $class_name . '.php';
    }
    if(file_exists('helpers/' . $class_name . '.php')){
        require 'helpers/' . $class_name . '.php';
    }
}
//Automatiza o carregamento dso modelos
spl_autoload_register ('myLoarders');
?>