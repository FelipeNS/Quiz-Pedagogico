<?php
	class ListarPerguntas{
		public function listar(){
			$result = Db::queryAll("SELECT perg_id, perg_enunciado FROM pergunta");

			for ($i=0; $i < sizeof($result); $i++) { 
				echo "<li>
                <div class='collapsible-header' style='background-color: #f5f5f5;'>
                <n class='col s4 m4' style='color: #000'>Questão ".($i+1)." </n>
                <a href='deletar-pergunta?id=".$result[$i]['perg_id']."' title='Clique aqui para deletar'>
                <i class= 'secondary-content material-icons' style='color: red; float: right;'>delete_forever</i></a>
		        <a href='alterar-pergunta?id=".$result[$i]['perg_id']."' title='Clique aqui para editar'>
                <i class= 'secondary-content material-icons' style='color: orange; float: right;'>edit</i></a>
                </div>
                <div class='collapsible-body col s4 m4' style='background-color: #fcfcfc; color: #000'>
                <p>".$result[$i]['perg_enunciado']."</p>
                </div>
            	</li>";
			}
		}
	}
?>