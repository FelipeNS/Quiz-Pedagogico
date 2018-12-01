<?php
    class MudarPerguntaController extends Controller{
        public function process($params){
            $id = $_POST['id_perg'];
            $enunciado = $_POST['enunciado'];
            $altCorreta = $_POST['alt_correta'];
            $id_ac = $_POST['alt_c'];
            $altInc1 = $_POST['alt_incorreta_1'];
            $id_ai1 = $_POST['alt_i1'];
            $altInc2 = $_POST['alt_incorreta_2'];
            $id_ai2 = $_POST['alt_i2'];
            $altInc3 = $_POST['alt_incorreta_3'];
            $id_ai3 = $_POST['alt_i3'];
            $materia = $_POST['materia'];
            
            $alterar = new AlterarPergunta();
            
            if($enunciado != "" && $altCorreta != "" && $altInc1 != "" && $altInc2 != "" && $altInc3 != ""){
                if(isset($enunciado) && isset($altCorreta) && isset($altInc1) && isset($altInc2) && isset($altInc3) && isset($materia)){

                    $result = $alterar->alterar($id, $enunciado, $materia);
                    $result2 = $alterar->alternativas($id_ac, $id_ai1, $id_ai2, $id_ai3, $altCorreta, $altInc1, $altInc2, $altInc3);
                    
                    //if($result != 0){
                        $this->redirect('editar-perguntas');
                    //}else{
                      //  echo "Nao foi bagaça";
                    //}
                }
            }else{
                echo "Sem valores setados";
            }
        }
    }
?>
