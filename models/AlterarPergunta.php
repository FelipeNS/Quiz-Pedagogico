<?php
	class AlterarPergunta{
		public function alterar($id, $enunciado, $materia){
			$result = Db::queryCount("UPDATE pergunta SET perg_enunciado=?, perg_cat_id=? WHERE perg_id=?", array($enunciado, $materia, $id));
            
            return $result;
		}
        
        public function alternativas($id_ac, $id_ai1, $id_ai2, $id_ai3, $altCorreta, $altInc1, $altInc2, $altInc3){
            $r1 = Db::queryCount("UPDATE alternativa SET alt_texto=? WHERE alt_id=?", array($altCorreta, $id_ac));
            $r2 = Db::queryCount("UPDATE alternativa SET alt_texto=? WHERE alt_id=?", array($altInc1, $id_ai1));
            $r3 = Db::queryCount("UPDATE alternativa SET alt_texto=? WHERE alt_id=?", array($altInc2, $id_ai2));
            $r4 = Db::queryCount("UPDATE alternativa SET alt_texto=? WHERE alt_id=?", array($altInc3, $id_ai3));
            
            if($r1 !=0 && $r2 !=0 && $r3 !=0 && $r4 !=0){
                return true;
            }else{
                return false;
            }
        }
	}
?>