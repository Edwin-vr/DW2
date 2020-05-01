<?php

require_once 'config/DB.php';

class Producto{

    private $id;
    private $categoria_id;
    private $nombre;
    private $descripcion;
    private $precio;
    private $stock;
    private $oferta;
    private $fecha;
    private $imagen;

    private $db;

    public function __construct(){
       $this->db = Database::connect();
    }

    function getId(){
        return $this->id;
    }

    function setId($id){
        $this->id = $id;
    }

    function getCategoria_id(){
        return $this->categoria_id;
    }

    function setCategoria_id($categoria_id){
        $this->categoria_id = $categoria_id;
    }

    function getNombre(){
        return $this->nombre;
    }

    function setNombre($nombre){
        $this->nombre = $this->db->real_escape_string($nombre);
    }

    function getDescripcion(){
        return $this->descripcion;
    }

    function setDescripcion($descripcion){
        $this->descripcion = $this->db->real_escape_string($descripcion);
    }

    function getPrecio(){
        return $this->precio;
    }

    function setPrecio($precio){
        $this->precio = $this->db->real_escape_string($precio);
    }

    function getStock(){
        return $this->stock;
    }

    function setStock($stock){
        $this->stock = $this->db->real_escape_string($stock);
    }

    function getOferta(){
        return $this->oferta;
    }

    function setOferta($oferta){
        $this->oferta = $this->db->real_escape_string($oferta);
    }

    function getFecha(){
        return $this->fecha;
    }

    function setFecha($fecha){
        $this->fecha = $fecha;
    }

    function getImagen(){
        return $this->imagen;
    }

    function setImagen($imagen){
        $this->imagen = $imagen;
    }

   // Obtiene todos los productos
    public function getAll(){
        $result = false;

        $sql= "SELECT * FROM productos ORDER BY id DESC";
        $consulta = $this->db->query($sql);

        if($consulta==true){
           $result = $consulta;
        }
        
        return $result;
    }
  
    public function getOne(){
        $result = false;

        $id = $this->id ;
        $sql= "SELECT * FROM productos WHERE id=$id;";
        $consulta = $this->db->query($sql);

        if($consulta==true){
           $result = $consulta->fetch_object();

        }
        
        return $result;
    
    }

     //guarda los productos
    public function guardar(){
        
        $sql = "INSERT INTO productos VALUES(null,{$this->getCategoria_id()},'{$this->getNombre()}','{$this->getDescripcion()}',{$this->getPrecio()},{$this->getStock()},null,CURDATE(),'{$this->getImagen()}')";

        $guardar = $this->db->query($sql);

        $result =false;

        if($guardar==true){
           $result=true;
        }

        return $result;
    }

    public function edit(){
        
        $result =false;

        $sql = "UPDATE productos SET categoria_id={$this->getCategoria_id()},nombre='{$this->getNombre()}',descripcion='{$this->getDescripcion()}',precio={$this->getPrecio()},stock={$this->getStock()},imagen='{$this->getImagen()}' WHERE id={$this->id}";


        $guardar = $this->db->query($sql);

        if($guardar == true){
           $result=true;
        }

        return $result;
    }

    public function delete(){

     $result = false;

     $sql="DELETE FROM productos WHERE id = '{$this->id}'";
     $delete = $this->db->query($sql);

     if($delete == true){
       $result = true;
     }

     return $result;
    }

    
 



}
?>