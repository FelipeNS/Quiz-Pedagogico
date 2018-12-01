<?php
    class MenuController extends Controller{
        public function process($params){
            session_start();
            if (isset($_SESSION['nivel'])) {
                if ($_SESSION['nivel'] == 1) {
                    // Adicionar as variaveis title e description para serem mostradas na pagina de erro
                    $this->head['title'] = "Menu - Quiz";
                    $this->head['description'] = "Menu";
                    // Chama o view correspondente ao nome para ser exibido.
                    $this->view = 'menu';    
                }else{
                    $this->redirect('professor');
                }
            }else{
            	$this->redirect('login');
            }
        }
    }
?>