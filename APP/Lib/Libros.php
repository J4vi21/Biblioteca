<?php
namespace APP\Lib;

class Libros {
    private $titulo;
    private $autor;
    private $editorial;
    private $anio_publicacion;

    public function __construct($titulo, $autor, $editorial , $anio_publicacion) {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->editorial = $editorial;
        $this->anio_publicacion = $anio_publicacion;
    }
    // Getters
    public function getTitulo(){ 
        return $this->titulo; 
    }
    public function getAutor(){ 
        return $this->autor; 
    }
    public function getEditorial(){
         return $this->editorial; 
        }
    public function getAnioPublicacion(){ 
        return $this->anio_publicacion; 
    }
    // Setters (si necesitas modificar valores)
    public function setTitulo($titulo){ 
        $this->titulo = $titulo;
    }
    public function setAutor($autor){ 
        $this->autor = $autor;
    }
    public function setEditorial($editorial){ 
        $this->editorial = $editorial; 
    }
    public function setAnioPublicacion($anio){ 
        $this->anio_publicacion = $anio;
    }
}
