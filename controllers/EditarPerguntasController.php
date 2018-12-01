<?php
    class EditarPerguntasController extends Controller{
        public function process($params){
            session_start();
            if (isset($_SESSION['nivel'])) {
            	if ($_SESSION['nivel'] == 0) {
            		// Adicionar as variaveis title e description para serem mostradas na pagina
            		$this->head['title'] = "Perguntas - Quiz";
            		$this->head['description'] = "Adicione ou edite as perguntas";
            		// Chama o view correspondente ao nome para ser exibido.
            		$this->view = 'editPerguntas';	
            	}else{
            		$this->redirect('menu');
            	}
            }else{
            	$this->redirect('login');
            }
        }
    }
?>