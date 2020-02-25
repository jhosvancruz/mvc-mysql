<?php
class EstacionesController extends ControladorBase{
    public $conectar;
	public $adapter;
	
    public function __construct() {
        parent::__construct();
		 
        $this->conectar=new Conectar();
        $this->adapter=$this->conectar->conexion();
    }
    
    public function index(){
        
          //Creamos el objeto usuario
          $usuario=new Usuario($this->adapter);
        
          //Conseguimos todos los usuarios
          $allusers=$usuario->getAll();
  
          //Estaciones
          $estacion=new Estaciones($this->adapter);
          $allestaciones=$estacion->getAll();
         
          //Cargamos la vista index y le pasamos valores
          $this->view("index",array(
              "allusers"=>$allusers,
              "allestaciones" => $allestaciones,
              "Hola"    =>"profe"
          ));
    }
    
    public function crear(){
        if(isset($_POST["nombre"])){
            
            //Creamos un estaciones
            $estaciones=new Estaciones($this->adapter);
            $estaciones->setNombre($_POST["nombre"]);
            $estaciones->setUrl($_POST["url"]);
            $save=$estaciones->save();
        }
        $this->redirect("estaciones", "index");
    }
    
    public function borrar(){
        if(isset($_GET["id"])){ 
            $id=(int)$_GET["id"];
            
            $estaciones=new Estaciones($this->adapter);
            $estaciones->deleteById($id); 
        }
        $this->redirect();
    }
    
    
    public function hola(){
        $estacioness=new Estaciones($this->adapter);
        $usu=$estacioness->getUnestacion();
        var_dump($usu);
    }

}
?>
