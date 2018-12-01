<?php
	class BuscarPergunta{
		public function buscar(){
			$result = Db::queryAll("SELECT perg_id, perg_enunciado FROM pergunta p 
                        WHERE p.perg_id NOT IN (SELECT test_perg_id FROM teste WHERE test_data=? AND test_log_id=?) 
                        ORDER BY rand()", array(date("Y-m-d", time()), $_SESSION['id_user']));
            
			for ($i=0; $i < sizeof($result); $i++) { 
				$enunciado = $result[$i]['perg_enunciado'];
                $_SESSION['id_perg'] = $result[$i]['perg_id'];
                return $enunciado;
			}
		}
        
        public function alternativas($id){
            //Db::connect('localhost', 'root', '', 'quizpedag');
			$result = Db::queryAll("SELECT alt_id, alt_texto, alt_resposta FROM alternativa WHERE alt_perg_id=? ORDER BY rand()", array($id));

			for ($i=0; $i < sizeof($result); $i++) { 
                if($i == 0){
                    echo "<p><input class='with-gap' name='alternativa' type='radio' id='alternativa".($i+1)."' value='".$result[$i]['alt_resposta']."' checked required />
                        <label for='alternativa".($i+1)."' style='color: #FFF'>".$result[$i]['alt_texto']."</label>
                      </p>";    
                }else{
                    echo "<p><input class='with-gap' name='alternativa' type='radio' id='alternativa".($i+1)."'value='".$result[$i]['alt_resposta']."' required />
                        <label for='alternativa".($i+1)."' style='color: #FFF'>".$result[$i]['alt_texto']."</label>
                      </p>";
                }
				
			}
        }
        
        public function buscarAlterar($id){
            $result = Db::queryAll("SELECT perg_enunciado FROM pergunta WHERE perg_id=?", array($id));
            
            for($i=0; $i < sizeof($result); $i++){
                $data = array($result[$i]['perg_enunciado']);
            }
            
            $result = Db::queryAll("SELECT alt_id, alt_texto, alt_resposta FROM alternativa WHERE alt_perg_id=? ORDER BY alt_id", array($id));
            
            for($j=0; $j < sizeof($result); $j++){
                array_push($data, $result[$j]['alt_texto']);
                array_push($data, $result[$j]['alt_id']);
            }
            
            return $data;
        }
	}
?>