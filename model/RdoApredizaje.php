<?php 
class RdoApredizaje {
    private $id_asignatura = null;
    private $descripcion = null;
    private $id_resultado_aprendizaje = null;

    //Getters and Setters
    public function getid_asignatura(){
		return $this->id_asignatura;
	}

	public function setid_asignatura($id_asignatura){
		$this->id_asignatura = $id_asignatura;
	}

	public function getDescripcion(){
		return $this->descripcion;
	}

	public function setDescripcion($descripcion){
		$this->descripcion = $descripcion;
	}

	public function getid_resultado_aprendizaje(){
		return $this->id_resultado_aprendizaje;
	}

	public function setid_resultado_aprendizaje($id_resultado_aprendizaje){
		$this->id_resultado_aprendizaje = $id_resultado_aprendizaje;
	}
}
?>