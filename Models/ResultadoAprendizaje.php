<?php
class ResultadoAprendizaje
{
    private int $id_asignatura;
    private string $nombre;
    private int $id_resultado_aprendizaje;
    private int $codigo;

    //Constructor
    public function __construct()
    {
    }

    /**
     * Allows dynamic property assignment while preserving encapsulation
     * 
     * This method is used to assign values to properties of the Asignatura class dynamically when fetching data using PDO::FETCH_CLASS. Is checks for the existence of a corresponding setter method and calls it ensuging controlling property access.
     * 
     * @param mixed $property The name of the entity attribute being assigned.
     * @param mixed $value The value to assign to the property.
     * @throws \Exception if the property does not exists on the class.
     * @return void
     */
    public function __set($property, $value): void
    {
        $method = 'set' . ucfirst($property);
        if (method_exists($this, $method)) {
            $this->$method($value);
        } else {
            throw new Exception("Cannot set property '$property'.");
        }
    }

    // Getter y setter 
    public function getId_asignatura(): int
    {
        return $this->id_asignatura;
    }

    public function setId_asignatura(int $id_asignatura): void
    {
        $this->id_asignatura = $id_asignatura;
    }
    public function getNombre(): string
    {
        return $this->nombre;
    }

    public function setNombre(string $nombre): void
    {
        $this->nombre = $nombre;
    }

    public function getCodigo(): int
    {
        return $this->codigo;
    }

    public function setCodigo($codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getId_resultado_aprendizaje() {
        return $this->id_resultado_aprendizaje;
    }

}
?>