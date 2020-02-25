<?php
class Estaciones extends EntidadBase{
    private $id;
    private $nombre;
    private $url;
    
    public function __construct($adapter) {
        $table="estaciones";
        parent::__construct($table,$adapter);
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }
    
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function getUrl() {
        return $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

    public function save(){
        $query="INSERT INTO estaciones (id,nombre,url)
                VALUES(NULL,
                       '".$this->nombre."',
                       '".$this->url."');";
        $save=$this->db()->query($query);
        //$this->db()->error;
        return $save;
    }

}
?>