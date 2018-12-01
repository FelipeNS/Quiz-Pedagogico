<?php
	class VerificaTeste{
		public function verificar($id){
			$result = Db::queryAll("SELECT * FROM teste WHERE test_log_id=? AND test_data=?", array($id, date('Y-m_d', time())));
            return $result;
		}
	}
?>