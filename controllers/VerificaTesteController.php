<?php
    class VerificaTesteController extends Controller{
        public function process($params){
            session_start();
            $teste = new VerificaTeste();
            $result = $teste->verificar($_SESSION['id_user']);
            
            if(empty($result)){
                $this->redirect("perguntas");
            }else{
                $_SESSION['ja'] = 1;
                $this->redirect("tutorial?e=1");
            }
        }
    }
?>