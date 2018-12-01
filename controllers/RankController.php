<?php
    class RankController extends Controller{
        public function process($params){
        	session_start();
        	if (isset($_SESSION['nivel'])) {
            	// Adicionar as variaveis title e description para serem mostradas na pagina de erro
            	$this->head['title'] = "Rank - Quiz";
            	$this->head['description'] = "Rank";
            	// Chama o view correspondente ao nome para ser exibido.
            	$this->view = 'rank';
            }else{
            	$this->redirect('login');
            }
        }
    }
?>