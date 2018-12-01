<?php
    class AlterarSenhaController extends Controller{
        public function process($params){
            $id = $_POST['id'];
            $senha = $_POST['nova_senha'];
            $alterar = new AlterarSenha();

            if($id != "" && $senha != ""){
                if(isset($id) && isset($senha)){
                    $result = $alterar->alterar($senha, $id);
                    if($result != 0){
                        $this->redirect('editar-usuarios');
                    }else{
                        $this->redirect("editar-usuarios?e=3");
                    }
                }
            }else{
                echo "Sem valores setados";
            }
        }
    }
?>
