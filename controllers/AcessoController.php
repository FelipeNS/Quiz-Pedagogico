<?php
    class AcessoController extends Controller{
        public function process($params){
            $login = new UsuarioLogin();
            $login->estaLogado(false);
            $this->head['title'] = "Acesso";
            if(isset($_POST['nick']) && isset($_POST['password'])){
                $usuario = $_POST['nick'];
                $senha = $_POST['password'];
                $result = $login->login($usuario, $senha);
                if($result == true){
                    if($_SESSION['nivel'] == 0){
                        $this->redirect("professor");
                    }else{
                        $this->redirect("menu");
                    }
                }else{
                    $this->redirect("login?e=1");
                }
            }
            $this->view = 'login';
        }
    }
?>