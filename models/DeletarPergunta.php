<?php
	class DeletarPergunta{
		public function deletar($id){
			// Excluindo alternativas primeiro
            $this->deletarAlts($id);
            // Excluindo testes contendo a pergunta
            $this->deletarTestes($id);
			// Excluindo pergunta no banco
			return $result = Db::queryCount("DELETE FROM pergunta WHERE perg_id=?", array($id));
		}

		private function deletarAlts($id){
			$result = Db::queryCount("DELETE FROM alternativa WHERE alt_perg_id=?", array($id));
			return $result;
		}
        
        private function deletarTestes($id){
        $result = Db::queryCount("DELETE FROM teste WHERE test_perg_id=?", array($id));
    }
	}
?>