<?php 
class Asignatura {
	private $id_asignatura = null;
	private $descripcion = null;
	private $nombre = null;

	//Getters and setters
	public function getId(){
		return $this->id_asignatura;
	}

	public function setId($id_asignatura){
		$this->id_asignatura = $id_asignatura;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getNombre(){
		return $this->nombre;
	}

	public function setNombre($nombre){
		$this->nombre = $nombre;
	}
}

?>
