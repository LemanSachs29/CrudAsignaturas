<?php 
class CriterioEvaluacion {
    private $id_criterio = null;
    private $descripcion = null;
    private $id_resultado_aprendizaje = null;

    
    //Getters and Setters
    public function getId_criterio(){
		return $this->id_criterio;
	}

	public function setId_criterio($id_criterio){
		$this->id_criterio = $id_criterio;
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