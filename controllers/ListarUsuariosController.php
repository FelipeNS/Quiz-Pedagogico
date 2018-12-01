<?php
class ListarUsuariosController extends Controller{
    public function process($params){
        session_start();
        if (isset($_SESSION['nivel'])) {
            if ($_SESSION['nivel'] == 0) {
                // Adicionar as variaveis title e description para serem mostradas na pagina de erro
                $this->head['title'] = "Usuários - Quiz";
                $this->head['description'] = "Listar Usuários";
                // Chama o view correspondente ao nome para ser exibido.
                $this->view = 'listUsuarios';    
            }else{
                $this->redirect('menu');
            }
        }else{
            $this->redirect('login');
        }
    }
}
?>