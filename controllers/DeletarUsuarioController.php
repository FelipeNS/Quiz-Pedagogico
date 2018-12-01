<?php
class DeletarUsuarioController extends Controller{
    public function process($params){
        $deletar = new DeletarUsuario();
        if(isset($_GET['id'])){
        $id = $_GET['id'];
        $result = $deletar->deletar($id);
            if($result != 0){
                $this->redirect('listar-usuarios');
            }else{
                echo "";
            }
        }
    }
}
?>