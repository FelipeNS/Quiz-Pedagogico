<?php
    class InicialController extends Controller{
        public function process($params){
            session_start();
            // Adicionar as variaveis title e description para serem mostradas na pagina de erro
            $this->head['title'] = "Bem Vindo - Quiz";
            $this->head['description'] = "Quiz";
            // Chama o view correspondente ao nome para ser exibido.
            $this->view = 'inicial';    
            
        }
    }
?>