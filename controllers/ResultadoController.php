<?php
    class ResultadoController extends Controller{
        public function process($params){
            session_start();
            if(isset($_SESSION['pontuacao'])) {
                    // Adicionar as variaveis title e description para serem mostradas na pagina de erro
                    $this->head['title'] = "Resultado - Quiz";
                    $this->head['description'] = "Resultado após quiz finalizado";
                    // Chama o view correspondente ao nome para ser exibido.
                    $this->view = 'resultado';
            }else{
            	$this->redirect('menu');
            }
        }
    }
?>