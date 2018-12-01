<?php
    
    // Requisito o uso do autoloader
    require 'lib/autoloader.php';
    
    // Coloco o encodamento interno das paginas para UTF-8
    mb_internal_encoding('ISO-8859-1');
    
    // Timezone
    date_default_timezone_set('America/Sao_Paulo');
    
    // Conexao Com banco de dados
    try {
        Db::connect('host', 'usuario', 'senha', 'base');
        //Db::connect('localhost', 'root', '', 'quizpedag');
    } catch (Exception $e) {
        die("Erro ao conectar ao banco de dados!");
    }

    // Criar um objeto instanciado da classe RouterController, e passar via superglobal $_SERVER
    
    // um array da url requisitada via REQUEST_URI para que o Router processe essa informação.
    $router = new RouterController();
    $router->process(array($_SERVER['REQUEST_URI']));
    $router->renderView();

?>
