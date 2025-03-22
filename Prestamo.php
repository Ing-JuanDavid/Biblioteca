<?php
class Prestamo {
    public function __construct(
        public int $id,
        public int $idUsuario,
        public int $isbnLibro,
        public string $fecha){
    }

    // magic set y get
    public function __set($name, $value) {
        if(property_exists($this, $name)) {
            $this->$name = $value;
        }
    }

    public function __get($name) {
        if(property_exists($this, $name)){
            return $this->$name;
        }
    }

    public function toString(){
        echo($this->id.", ".$this->nombre.", ".$this->telefono);
    }
}