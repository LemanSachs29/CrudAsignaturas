<?php

require_once 'Database.php';
require_once 'Asignatura.php';
/**
 * @author Juan  <juanblancomoyano@gmail.com>
 * Manager class responsible for managing CRUD operations on the Asignatura entity.
 * 
 * This class handles the creation, reading, updating, and deletion of Asignatura records in the 
 * datasbase. It interacts whith the Asignatura class and the database.
 * 
 * @package Models
 */
class AsignaturaManager
{

    //Conexion a la base de datos
    private $db = null;

    private $table = "asignaturas";


    public function create(string $nombre, array $opciones = []): bool
    {
    }


    /**
     * Retrieves a subject by its ID from the database.
     *
     * This method retrieves information about a subject (asignatura) from the database
     * and returns an instance of the Asignatura class if found. If no subject is found,
     * it returns null. The database connection is properly managed and closed after execution.
     *
     * @param int $id_asignatura The subject ID in the database to search for.
     * @return Asignatura|null An instance of the Asignatura class if found, or null otherwise.
     * @throws PDOException If there is an error executing the query.
     */
    public function read(int $id_asignatura): ?Asignatura
    {
        $asignatura = null;
        try {

            /** @var PDO $this->db */
            $this->db = Database::getConnetion();

            //String con la consulta
            $query = "SELECT id_asignatura, nombre, equivalencia_ects, codigo, horas 
                        FROM  {$this->table} 
                        WHERE id_asignatura = :idAsignatura";

            /** @var Asignatura|false $asignatura */
            $statement = $this->db->prepare($query);

            $statement->execute([':idAsignatura' => $id_asignatura]);

            $statement->setFetchMode(PDO::FETCH_CLASS, 'Asignatura');

            /** @var Asignatura | false $asignatura */
            $asignatura = $statement->fetch();

            if ($asignatura == false) {
                $asignatura = null;
            }


        } catch (PDOException $e) {
            echo "Error al ejecutar la consulta: " . $e->getMessage();
        } finally {
            $this->db = Database::closeConnection($this->db);
            return $asignatura;
        }
    }

    /**
     * Retrieves all subjects from the database.
     *
     * This method retrieves information about all the subjects (asignatura) from the database
     * and returns an array of Asignatura class if found. If no subject is found,
     * it returns null. The database connection is properly managed and closed after execution.
     *
     * @return array|null
     * @throws PDOException if there is an error executing the query
     */
    public function readAll(): array
    {
        $asignaturas = null;
        try {
            $this->db = Database::getConnetion();

            $query = "SELECT id_asignatura, nombre, equivalencia_ects, codigo, horas
                        FROM {$this->table}";

            $statement = $this->db->query($query);

            $statement->setFetchMode(PDO::FETCH_CLASS, 'Asignatura');
            $asignaturas = $statement->fetchAll();

            if ($asignaturas == false) {
                $asignaturas = null;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            $this->db = Database::closeConnection($this->db);
            return $asignaturas;
        }
    }

    // public function update (int $id_asignatura, array $opciones = []): bool {}

    // public function delete(int $id_asignatura): bool {}


}


$miAsignaturaController = new AsignaturaController();

$miAsignatura = $miAsignaturaController->readAll();

var_dump($miAsignatura);

?>