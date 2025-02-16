<?php
/**
 * Summary of Asignatura
 * Representation of entity asignatura on the database
 * @author Juan <juanblancomoyano@gmail.com>
 */
class Asignatura
{
	private int $id_asignatura;
	private string $nombre = "";
	private int $equivalencia_ects = 0;
	private int $codigo = 0;
	private int $horas = 0;

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

	public function getIdAsignatura(): int
	{
		return $this->id_asignatura;
	}
	public function setIdAsignatura(int $id_asignatura): void
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
	public function getEquivalenciaEcts(): ?int
	{
		return $this->equivalencia_ects;
	}
	public function setEquivalenciaEcts(?int $equivalencia_ects): void
	{
		$this->equivalencia_ects = $equivalencia_ects;
	}
	public function getCodigo(): ?int
	{
		return $this->codigo;
	}
	public function setCodigo(?int $codigo): void
	{
		$this->codigo = $codigo;
	}
	public function getHoras(): ?int
	{
		return $this->horas;
	}
	public function setHoras(?int $horas): void
	{
		$this->horas = $horas;
	}
}
?>