<?php
    class BancoController extends Controller{
        public function process($params){
            $banco = new Query();
            //$banco->update();
            //$banco->insert();
            $result = $banco->select();
//            var_dump($result);
             for($i=0; $i < sizeof($result); $i++){
                 echo "log_id: " . $result[$i]['alt_id'] . "----------- log_usuario: " . $result[$i]['alt_perg_id'] . "----------- log_senha: " .$result[$i]['log_senha']. "<br>";

             }
        }
    }
?>