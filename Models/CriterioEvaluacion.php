<?php
class CriterioEvaluacion
{
	private int $id_criterio;
	private int $id_resultado_aprendizaje;
	private string $descripcion;
	private int $orden;


	public function __construct()
	{
	}

	// Getter y setter

	public function __set($property, $value): void
	{
		$method = 'set' . ucfirst($property);
		if (method_exists($this, $method)) {
			$this->$method($value);
		} else {
			throw new Exception("Cannot set property '$property'.");
		}
	}

	public function setId_criterio(int $id_criterio): void
	{
		$this->id_criterio = $id_criterio;
	}

	public function setId_resultado_aprendizaje(int $id_resultado_aprendizaje): void
	{
		$this->id_criterio = $id_resultado_aprendizaje;
	}

	public function setDescripcion(string $descripcion): void
	{
		$this->descripcion = $descripcion;
	}

	public function setOrden(int $orden)
	{
		$this->orden = $orden;
	}

	public function getId_criterio(): int
	{
		return $this->id_criterio;
	}

	public function getId_resultado_aprendizaje(): int
	{
		return $this->id_resultado_aprendizaje;
	}

	public function getDescripcion(): string
	{
		return $this->descripcion;
	}

	public function getOrden(): int
	{
		return $this->orden;
	}
}
?>