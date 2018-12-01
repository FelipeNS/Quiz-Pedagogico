<?php
class DeletarUsuario{
	public function deletar($id){
        // Exclui do rank primeiro
        $this->deletarRank($id);
        // Exclui os testes feitos pelo usuário
        $this->deletarTestes($id);
		// Excluindo usuario do banco
		return $result = Db::queryCount("DELETE FROM login WHERE log_id=?", array($id));
	}
    
    private function deletarRank($id){
        $result = Db::queryCount("DELETE FROM rank WHERE rank_log_id=?", array($id));
        return $result;
    }
    
    private function deletarTestes($id){
        $result = Db::queryCount("DELETE FROM teste WHERE test_log_id=?", array($id));
    }
}
?>