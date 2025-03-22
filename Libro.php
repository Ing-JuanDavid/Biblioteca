<?php
class Libro {

    public function __construct(
        public int $isbn,
        public string $titulo,
        public string $fechaPublicacion,
        public string $autor){
    }

    public function __set($nombre, $valor) {
        if(property_exists($this, $nombre)) {
            $this->$nombre = $valor;
        }
    }

    public function __get($nombre) {
        if(property_exists($this, $nombre)){
            return $this->$nombre;
        }
    }

    public function toLine(){
        return($this->isbn."|".$this->titulo."|".$this->fechaPublicacion."|".$this->autor);
    }

    public function lineToLibro($linea) {
        $cadena = explode("|",$linea);
        return new Libro(((int)$cadena[0]),$cadena[1],$cadena[2],$cadena[3]);
    }
}
