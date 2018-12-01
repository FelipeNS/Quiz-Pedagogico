<?php
    class EditarUsuariosController extends Controller{
        public function process($params){
            session_start();
            if (isset($_SESSION['nivel'])) {
            	if ($_SESSION['nivel'] == 0) {
            		// Adicionar as variaveis title e description para serem mostradas na pagina
            		$this->head['title'] = "Usuários - Quiz";
            		$this->head['description'] = "Adicione ou edite os usuários";
            		// Chama o view correspondente ao nome para ser exibido.
            		$this->view = 'editUsuarios';	
            	}else{
            		$this->redirect('menu');
            	}
            }else{
            	$this->redirect('login');
            }
        }
    }
?>