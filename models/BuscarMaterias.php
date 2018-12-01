<?php
	class BuscarMaterias{
		public function buscar(){
			$result = Db::queryAll("SELECT cat_id, cat_materia FROM categoria ORDER BY cat_materia");
			for ($i=0; $i < sizeof($result); $i++) { 
				echo "<option value='".$result[$i]['cat_id']."' selected style='color: #000'>".$result[$i]['cat_materia']."</option>";
			}
		}
        
        public function buscarAlterar($id){
			$result = Db::queryAll("SELECT cat_id, cat_materia FROM categoria ORDER BY cat_materia");
            
            $cat = Db::queryAll("SELECT perg_cat_id FROM pergunta WHERE perg_id=?", array($id));
            
            for($j=0; $j < sizeof($cat); $j++){
                $categoria = $cat[$j]['perg_cat_id'];
            }
            
			for ($i=0; $i < sizeof($result); $i++) { 
                if($result[$i]['cat_id'] == $categoria){
                    $option = "selected";
                }else{
                    $option = "";
                }
				echo "<option value='".$result[$i]['cat_id']."' ".$option." style='color: #000'>".$result[$i]['cat_materia']."</option>";
			}
		}
	}
?>

