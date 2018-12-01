<?php
    class LoginController extends Controller{
        public function process($params){
            // Adicionar as variaveis title e description para serem mostradas na pagina de erro
            $this->head['title'] = "Login - Quiz";
            $this->head['description'] = "Login no sistema";
            // Chama o view correspondente ao nome para ser exibido.
            $this->view = 'login';
        }
    }
?>