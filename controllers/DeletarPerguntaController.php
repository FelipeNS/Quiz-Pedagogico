<?php
	class DeletarPerguntaController extends Controller{
		public function process($params){
            $deletar = new DeletarPergunta();
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                $result = $deletar->deletar($id);
                if($result != 0){
                    $this->redirect('editar-perguntas');
                }else{
                    echo "";
                }
            }
        }
	}
?>