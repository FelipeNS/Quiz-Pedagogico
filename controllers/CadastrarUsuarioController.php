<?php
class CadastrarUsuarioController extends Controller{
    public function process($params){
        $cadastrar = new CadastrarUsuario();

        $nome = $_POST['nome'];
        $sobrenome = $_POST['sobrenome'];
        $nick = $_POST['nick'];
        $senha = $_POST['senha'];
        $nivel = $_POST['nivel'];

        if($nome != "" && $sobrenome != "" && $nick != "" && $senha != ""){ 
            if(isset($nome) && isset($sobrenome) && isset($nick) 
             && isset($senha) && isset($nivel)){
                $nomeComp = $nome . " " . $sobrenome;
                $verifica = $cadastrar->verifica($nomeComp);
                if($verifica == null){
                    $result = $cadastrar->cadastrar($nick, $nomeComp, $senha, $nivel);
                    if($result != 0){
                        $this->redirect('editar-usuarios');
                    }else{
                        echo "Nao foi";
                    }
                }else{
                    $this->redirect('editar-usuarios?e=1');
                }
        }
        }else{
            echo "Sem valores nos campos";
        }
    }
}
?>