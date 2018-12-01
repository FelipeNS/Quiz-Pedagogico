<?php
    class InfoController extends Controller{
        public function process($params){
            // Adicionar as variaveis title e description para serem mostradas na pagina de erro
            $this->head['title'] = "Informações - Quiz";
            $this->head['description'] = "Quiz";
            // Chama o view correspondente ao nome para ser exibido.
            $this->view = 'info';
        }
    }
?>