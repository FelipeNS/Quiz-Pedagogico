<?php
class PerguntasController extends Controller{
    public function process($params){
        session_start();
        if (isset($_SESSION['nivel'])) {
            if ($_SESSION['nivel'] == 1 ) {
                if(!isset($_SESSION['respondido'])){
                    // Adicionar as variaveis title e description para serem mostradas na pagina de erro
                    $this->head['title'] = "Quiz - Quiz";
                    $this->head['description'] = "Quiz";
                    // Chama o view correspondente ao nome para ser exibido.
                    $this->view = 'perguntas';
                }else{
                    $this->redirect('menu');    
                }
            }else{
                $this->redirect('professor');
            }
        }else{
            $this->redirect('login');
        }
    }
}
?>
