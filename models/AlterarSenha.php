<?php
	class AlterarSenha{
		public function alterar($senha, $id){
			$result = Db::queryCount("UPDATE login SET log_senha=? WHERE log_id=?", array($senha, $id));
            return $result;
		}
	}
?>