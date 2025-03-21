<?php
class Usuario {
    public function __construct(
        public int $id,
        public string $nombre,
        public int $telefono){
    }

    public function toString(){
        echo($this->id.", ".$this->nombre.", ".$this->telefono);
    }
}

