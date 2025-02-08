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

    /**
     * Represents the database connection
     * @var PDO
     */
    private PDO $db;
    /**
     * Name of the entity on the database
     * @var string
     */
    private string $table = "asignaturas";

    /**
     * This methods inserts a new Asignatura on table Asignatura
     * @param Asignatura Instance of Asignatura
     * @return bool if the Insert statement is succesful
     * @throws PDOException if there is an error executing the query
     */
    public function create(Asignatura $asignatura): bool
    {
        $result = false;
        try {

            /** @var PDO $this->db */
            $this->db = Database::getConnection();

            $query = "INSERT INTO {$this->table} (nombre, equivalencia_ects, codigo, horas) VALUES (:nombre, :equivalencia_ects, :codigo, :horas)";

            $statement = $this->db->prepare($query);

            $result = $statement->execute([":nombre" => $asignatura->getNombre(), ":equivalencia_ects" => $asignatura->getEquivalenciaEcts(), ":codigo" => $asignatura->getCodigo(), ":horas" => $asignatura->getHoras()]);



        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            return $result;
        }
    }

    /**
     * Retrieves a subject by its ID from the database.
     *
     * This method retrieves information about a subject (asignatura) from the database
     * and returns an instance of the Asignatura class if found. If no subject is found,
     * it returns null.
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
            $this->db = Database::getConnection();

            $query = "SELECT id_asignatura, nombre, equivalencia_ects, codigo, horas 
                        FROM  {$this->table} 
                        WHERE id_asignatura = :idAsignatura";

            /** @var PDOStatement|false $statement */
            $statement = $this->db->prepare($query);

            $statement->execute([':idAsignatura' => $id_asignatura]);

            $statement->setFetchMode(PDO::FETCH_CLASS, 'Asignatura');

            /** @var Asignatura | false $asignatura */
            $asignatura = $statement->fetch();

            if ($asignatura == false) {
                $asignatura = null;
            }


        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            return $asignatura;
        }
    }

    /**
     * Retrieves all subjects from the database.
     *
     * This method retrieves information about all the subjects (asignatura) from the database
     * and returns an array of Asignatura class if found. If no subject is found,
     * it returns null.
     *
     * @return array|null
     * @throws PDOException if there is an error executing the query
     */
    public function readAll(): array
    {
        $asignaturas = null;
        try {
            $this->db = Database::getConnection();

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
            return $asignaturas;
        }
    }

    /**
     * Summary updates a subject on the database.
     * @param int $id Id of the subject in the database
     * @param array<string, mixed> $fields Associative array with the fields to update.
     *                                  Supported keys:
     *                                  -'nombre' => string
     *                                  -'equivalencia_ects' => int
     *                                  -'codigo' => int
     *                                  -'horas' => int
     * @return bool True on success, false failure
     * @throws PDOException if there is an error executing the query
     * @return bool True if the query executed without errors, false otherwise.
     */
    public function update(int $id, array $fields): bool
    {
        $result = false;

        try {

            $this->db = Database::getConnection();

            $setClause = "";
            $params = [":id" => $id];

            foreach ($fields as $field => $value) {
                $setClause .= "$field = :$field, ";
                $params[":$field"] = $value;
            }

            $setClause = rtrim($setClause, ", ");

            $query = "UPDATE {$this->table}
                        SET $setClause WHERE id_asignatura = :id";

            $statement = $this->db->prepare($query);

            $result = $statement->execute($params);


        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();

        } finally {
            return $result;
        }

    }
    /**
     * Deletes a subject in the database
     * @param int $id_asignatura The subject ID in the database to search for.
     * @return bool True on success, false failure
     * @throws PDOException if there is an error executing the query
     * @return bool True if the query executed without errors, false otherwise.
     */
    public function delete(int $id_asignatura): bool
    {
        $result = false;
        try {
            $this->db = Database::getConnection();


            $this->db = Database::getConnection();

            $query = "DELETE FROM {$this->table} WHERE id_asignatura = :id";

            $statement = $this->db->prepare($query);
            $result = $statement->execute([":id" => $id_asignatura]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            return $result;
        }
    }

}






$campos = ["nombre" => "Sistemas informáticos", "horas" => "35", "equivalencia_ects" => "45"];

$miAsignaturaController = new AsignaturaManager();

$miAsignatura = $miAsignaturaController->delete(2);
var_dump($miAsignatura);


?>