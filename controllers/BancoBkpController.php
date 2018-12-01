<?php
    class BancoBkpController extends Controller{
        public function process($params){
            $banco = new Query();
            //$banco->update();
            //$banco->insert();
            $result = $banco->select();
//            var_dump($result);
             for($i=0; $i < sizeof($result); $i++){
                 echo "log_id: " . $result[$i]['log_id'] . "----------- log_usuario: " . $result[$i]['log_usuario'] . "----------- log_senha: " .$result[$i]['log_senha']. "----------- log_nivel: " .$result[$i]['log_nivel'] ."<br>";

             }
        }
    }
?>