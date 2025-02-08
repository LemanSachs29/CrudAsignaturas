<?php
class CriterioEvaluacion
{
	private int $id_resultado_aprendizaje;
	private string $nombre;
	private string $codigo;
	private int $id_asignatura;

	public function __construct()
	{
	}

	// Getter y setter
	public function getIdResultadoAprendizaje(): int
	{
		return $this->id_resultado_aprendizaje;
	}

	public function setIdResultadoAprendizaje(int $id_resultado_aprendizaje): void
	{
		$this->id_resultado_aprendizaje = $id_resultado_aprendizaje;
	}

	public function getNombre(): string
	{
		return $this->nombre;
	}

	public function setNombre(string $nombre): void
	{
		$this->nombre = $nombre;
	}

	public function getCodigo(): string
	{
		return $this->codigo;
	}

	public function setCodigo(string $codigo): void
	{
		$this->codigo = $codigo;
	}

	public function getIdAsignatura()
	{
		return $this->id_asignatura;
	}

	public function setIdAsignatura($id_asignatura): void
	{
		$this->id_asignatura = $id_asignatura;
	}
}
?>