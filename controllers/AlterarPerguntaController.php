<?php
    class AlterarPerguntaController extends Controller{
        public function process($params){
            session_start();
            if (isset($_SESSION['nivel'])) {
            	if ($_SESSION['nivel'] == 0) {
            		// Adicionar as variaveis title e description para serem mostradas na pagina
            		$this->head['title'] = "Alterar Perguntas - Quiz";
            		$this->head['description'] = "Altere as perguntas do quiz";
            		// Chama o view correspondente ao nome para ser exibido.
            		$this->view = 'alterarPerguntas';	
            	}else{
            		$this->redirect('menu');
            	}
            }else{
            	$this->redirect('login');
            }
        }
    }
?>