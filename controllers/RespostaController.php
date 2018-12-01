<?php
    class RespostaController extends Controller{
        public function process($params){
            session_start();
            $id_perg = $_SESSION['id_perg'];
            $resposta = $_POST['alternativa'];
            
            $quiz = new Quiz();
            
            $result = $quiz->responder($_SESSION['id_user'], $id_perg, $resposta);
            
           if(!isset($_SESSION['pontuacao'])){
               $_SESSION['pontuacao'] = 0;
           }
           
           if($resposta == 1){
               $_SESSION['pontuacao'] = $_SESSION['pontuacao'] + 1;
               //Linhas para adição dos emojis de certo
               $q = $_SESSION['questao'] - 1;
               $p = "p".$q;
               $_SESSION[$p] = 1;
           }else{
               //Linhas para adição dos emojis de errado
               $q = $_SESSION['questao'] - 1;
               $p = "p".$q;
               $_SESSION[$p] = 2;
           }
           
           if(!isset($_SESSION['questao'])){
               $_SESSION['questao'] = 1;
           }else{
               if($_SESSION['questao']  == 10 ){
                   $_SESSION['questao'] = 1;
                   $quiz->setarRank($_SESSION['id_user'], $_SESSION['pontuacao']);
                   Controller::redirect('resultado');
               }else{
                   $_SESSION['questao'] = $_SESSION['questao'] + 1;
               }
           }
           
           $this->redirect('perguntas');
        }
    }
?>
