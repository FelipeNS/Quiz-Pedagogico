<?php
	class CadastrarPergunta{
		public function cadastrar($enunciado, $altCorreta, $altInc1, $altInc2, $altInc3, $materia){
			// Inserindo pergunta no banco
			$result = Db::queryCount("INSERT INTO pergunta (perg_enunciado, perg_cat_id) VALUES (?,?)", array($enunciado, $materia));
			
			// Pegando id da pergunta para setar na fk das alternativas
			$idPergunta = $this->getId($enunciado);

			// Cadastrando alternativa que será a correta
			$this->cadAltCorreta($altCorreta, $idPergunta);

			// Cadastrando alternativas erradas
			$this->cadAltErrada($altInc1, $idPergunta);
			$this->cadAltErrada($altInc2, $idPergunta);
			return $this->cadAltErrada($altInc3, $idPergunta);
		}

		private function getId($enunciado){
			$result = Db::queryOne("SELECT perg_id FROM pergunta WHERE perg_enunciado=?", array($enunciado));
			return $result['perg_id'];
		}

		private function cadAltCorreta($alt, $idPergunta){
			$result = Db::queryCount("INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES (?, ?, 1)", array($alt, $idPergunta));
			return $result;
		}

		private function cadAltErrada($alt, $idPergunta){
			$result = Db::queryCount("INSERT INTO alternativa (alt_texto, alt_perg_id, alt_resposta) VALUES (?, ?, 0)", array($alt, $idPergunta));
			return $result;
		}
	}
?>