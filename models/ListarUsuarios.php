<?php
class ListarUsuarios{
	public function listar(){
		$result = Db::queryAll("SELECT log_id, log_nome, log_usuario, log_senha, log_dat_cad, log_nivel 
			FROM login WHERE log_nome<>'Administrador' ORDER BY log_nome");

		for ($i=0; $i < sizeof($result); $i++) { 
			$nivel = $result[$i]['log_nivel'];
			
			if($nivel==0){
				$cat = "<i class= 'secondary-content material-icons' style='color: #000; float: left;'>person</i>";
			}else{
				$cat = "<i class= 'secondary-content material-icons' style='color: #000; float: left;'>school</i>";
			}

			echo "<li>
			<div class='collapsible-header' style='background-color: #f5f5f5;'>
			<n class='col s4 m4' style='color: #000'>".$result[$i]['log_nome'].$cat."</n>
			<a href='deletar-usuario?id=".$result[$i]['log_id']."' title='Clique aqui para deletar'>
			<i class= 'secondary-content material-icons' 
			style='color: red; float: right;'>delete_forever</i><n style='color: red; font-size: .8em; float: right;'>Remover</n>
			</a>
			</div>
			<div class='collapsible-body col s4 m4' style='background-color: #fcfcfc; color: #000'>
			<p><b>Nick : </b>".$result[$i]['log_usuario']."<br>
			<b>Senha : </b>".$result[$i]['log_senha']."<br>
			<b>Data de Cadastro : </b>".date('d/m/Y', strtotime($result[$i]['log_dat_cad']))."</p>
			</div>
			</li>";
		}
	}
}
?>