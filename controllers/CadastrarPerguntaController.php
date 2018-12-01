<?php
class CadastrarPerguntaController extends Controller{
    public function process($params){
        $cadastrar = new CadastrarPergunta();

        $enunciado = $_POST['enunciado'];
        $altCorreta = $_POST['alt_correta'];
        $altInc1 = $_POST['alt_incorreta_1'];
        $altInc2 = $_POST['alt_incorreta_2'];
        $altInc3 = $_POST['alt_incorreta_3'];
        $materia = $_POST['materia'];

        if($enunciado != "" && $altCorreta != "" && $altInc1 != "" && $altInc2 != "" && $altInc3 != ""){
            if(isset($enunciado) && isset($altCorreta) && isset($altInc1) && isset($altInc2) && isset($altInc3) && isset($materia)){

                $result = $cadastrar->cadastrar($enunciado, $altCorreta, $altInc1, $altInc2, $altInc3, $materia);
                if($result != 0){
                    $this->redirect('editar-perguntas');
                }else{
                    echo "Nao foi bagaça";
                }
            }
        }else{
            echo "Sem valores setados";
        }
    }
}
?>