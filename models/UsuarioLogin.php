<?php
    class UsuarioLogin{
        private $baseUrl = "sistemas/quiz/";
        public function login($usuario, $senha){
            $result = Db::queryOne("SELECT log_id, log_usuario, log_nome, log_senha, log_nivel FROM login WHERE log_usuario = ?", array($usuario));
            if($result['log_senha'] == $senha){
                session_start();
                $_SESSION['id_user'] = $result['log_id'];
                $_SESSION['nome'] = $result['log_nome'];
                $_SESSION['usuario'] = $result['log_usuario'];
                $_SESSION['senha'] = $result['log_senha'];
                $_SESSION['nivel'] = $result['log_nivel'];
                return true;
            }else{
                return false;
            }
        }
        public function estaLogado($dentroDoSistema, $nivel = null, $params = null){
            if(isset($_SESSION['id_user']) || isset($_SESSION['senha']) || isset($_SESSION['nivel']) ){
                if($dentroDoSistema){
                    if($nivel == $_SESSION['nivel']){
                        if(($nivel == 0) && $params[0] == 'professor'){
                            return true;
                        }else if(($nivel == 1) && $params[0] == 'aluno'){
                            return true;
                        }else{
                            if($nivel == 0){
                                $this->redirect("professor/$params[0]");
                            }else if($nivel == 1){
                                $this->redirect("aluno/$params[0]");
                            }
                        }
                    }else{
                        $this->redirect('login?e=1');
                    }
                }else{
                    if($_SESSION['nivel'] == 0){
                        $this->redirect("professor");
                    }else if($_SESSION['nivel'] == 1){
                        $this->redirect("menu");
                    }
                }
            }
        }
        public function sair(){
            session_start();
            session_destroy();
        }
        public function redirect($url){
            $url = $this->baseUrl . $url;
            header("Location: /$url");
            header("Connection: close");
            exit;
        }
    }
?>