<?php
require __DIR__ . '/Alunno.php';
class Classe implements JsonSerializable {
    protected $nome;
    protected $array=[];
    public function __construct(){
        $this->nome = "5B";
        $a1 = new Alunno("aaa","bbb",25);
        $a2 = new Alunno("adg","ryuwe5y",343);
        $a3 = new Alunno("sdfhsfh","fjj",275);
        array_push($this->array, $a1);
        array_push($this->array, $a2);
        array_push($this->array, $a3);

    }

    public function getNome(){
        return $this->nome;
    }

    public function getArray(){
        return $this->array;
    }

    public function getAlunnoByNome($nome){
        foreach($this->array as $a){
            if($nome == $a->getNome()){
                return $a;
            }
        }
        return null;
    }

    public function jsonSerialize() {
        $attrs = [];
        $class_vars = get_class_vars(get_class($this));
        foreach ($class_vars as $name => $value) {
          $attrs[$name]=$this->{$name};
          
         }
        return $attrs;
    }


}

?>