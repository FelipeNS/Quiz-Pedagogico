<?php
class ListarRank{
	public function listar(){
        if($_SESSION['nivel'] == 1){
            $result = Db::queryAll("SELECT log_nome, log_id, max(rank_pontuacao) as rank_pontuacao 
                FROM rank INNER JOIN login ON rank.rank_log_id=login.log_id AND rank.rank_pontuacao <= 10 GROUP BY login.log_nome ORDER BY rank_pontuacao DESC LIMIT 10");
		  for ($i=0; $i < sizeof($result); $i++) { 	
			 if($i >= 0 && $i <3){
				$icone = "<i class='fa fa-trophy' aria-hidden='true' style='font-size: 1.5em; color: #FFD700; float: right; width: 1%;'></i>"; // Ouro
			 }elseif($i >=3 && $i <=6){
                $icone = "<i class='fa fa-trophy' aria-hidden='true' style='font-size: 1.5em; color: #c0c0c0; float: right; width: 1%;'></i>"; // Prata
			 }else{
				$icone = "<i class='fa fa-trophy' aria-hidden='true' style='font-size: 1.5em; color: #cd7f32; float: right; width: 1%;'></i>"; // Bronze
			 }

            if($result[$i]['rank_pontuacao'] <= 9){
			     echo "<li class='collection-item s4 m4'>".$icone."<div style='color: #000; float: right; width: 0%;'><br>0" .$result[$i]['rank_pontuacao']."</div>
            		  <div style='color: #000'><div style='font-size: .9em; font-weight: 700;'>Nome </div>".$result[$i]['log_nome']."</div>
        		      </li>";
            }else{
                echo "<li class='collection-item s4 m4'>".$icone."<div style='color: #000; float: right; width: 0%;'><br>" .$result[$i]['rank_pontuacao']."</div>
            		  <div style='color: #000'><div style='font-size: .9em; font-weight: 700;'>Nome </div>".$result[$i]['log_nome']."</div>
        		      </li>";
            }    
		  }
        }else{
            $result = Db::queryAll("SELECT log_nome, log_id, max(rank_pontuacao) as rank_pontuacao 
                FROM rank INNER JOIN login ON rank.rank_log_id=login.log_id AND rank.rank_pontuacao <= 10 GROUP BY login.log_nome ORDER BY log_nome");

            for ($i=0; $i < sizeof($result); $i++) {
            	//Buscando dados para o grafico
            	$teste = Db::queryAll("(SELECT rank_data, rank_pontuacao FROM rank WHERE rank_log_id=? ORDER BY rank_data DESC LIMIT 5) ORDER BY rank_data", array($result[$i]['log_id']));
                $ec = "";
            	for ($j=0; $j < sizeof($teste); $j++){
            		$pont = $teste[$j]['rank_pontuacao'];
            		$data = date('j/n/y', strtotime($teste[$j]['rank_data']));
                    $ec = $ec . "['".$data."',  ".$pont."],";
            	}

            	echo "<script type='text/javascript'>
      					google.charts.load('current', {'packages':['corechart']});
      					google.charts.setOnLoadCallback(drawChart);

      					function drawChart() {
        					var data = google.visualization.arrayToDataTable([
          					['Year', 'Pontuação'],
          					".$ec."
          					
        				]);

				        var options = {
				          title: 'Desempenho do aluno nos cinco ultimos testes',
                          width: 700,
                          height: 250,
				          hAxis: {title: 'Datas dos testes',  titleTextStyle: {color: '#333'}},
				          vAxis: {minValue: 0}
				        };

				        var chart = new google.visualization.AreaChart(document.getElementById('chart_div".$i."'));
				        chart.draw(data, options);
				      }
					</script>";
                
                echo "<li>
                		<div class='collapsible-header'>
            				<i class='material-icons'>show_chart</i> 
           						".$result[$i]['log_nome']."
        				</div>
        				<div class='collapsible-body' style='background-color: #fff; color: #000'>
            				<div id='chart_div".$i."' style='width: 700; height: 250;'></div>
        				</div>
    				</li>";
            }
        }
	}
}
?>