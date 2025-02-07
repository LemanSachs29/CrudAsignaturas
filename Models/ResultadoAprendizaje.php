<?php
class ResultadoApredizaje
{
    private int $id_criterio;
    private int $id_resultado_aprendizaje;
    private string $descripcion;
    private int $orden;

    //Constructor
    public function __construct()
    {
    }

    // Getter y setter 
    public function getIdCriterio(): int
    {
        return $this->id_criterio;
    }

    public function setIdCriterio(int $id_criterio): void
    {
        $this->id_criterio = $id_criterio;
    }

    public function getIdResultadoAprendizaje(): int
    {
        return $this->id_resultado_aprendizaje;
    }

    public function setIdResultadoAprendizaje(int $id_resultado_aprendizaje)
    {
        $this->id_resultado_aprendizaje = $id_resultado_aprendizaje;
    }
    public function getDescripcion(): string
    {
        return $this->descripcion;
    }

    public function setDescripcion(string $descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function getOrden(): int
    {
        return $this->orden;
    }

    public function setOrden(int $orden)
    {
        $this->orden = $orden;
    }
}
?>