<?php

require_once 'Database.php';
require_once 'ResultadoAprendizaje.php';

class ResultadoAprendizajeManager
{
    private PDO $db;
    private string $table = "resultados_aprendizaje";

    public function create(ResultadoAprendizaje $resultadoAprendizaje): bool
    {
        $result = false;

        try {
            $this->db = Database::getConnection();

            $query = "INSERT INTO {$this->table} (nombre, codigo, id_asignatura)
            VALUES (:nombre, :codigo, :id_asignatura)";

            $statement = $this->db->prepare($query);

            $result = $statement->execute([":nombre" => $resultadoAprendizaje->getNombre(), ":codigo" => $resultadoAprendizaje->getCodigo(), ":id_asignatura" => $resultadoAprendizaje->getId_asignatura()]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            return $result;
        }
    }

    public function read(int $id_resultado_aprendizaje): ?ResultadoAprendizaje
    {
        $resultadoAprendizaje = null;

        try {
            $this->db = Database::getConnection();

            $query = "SELECT id_resultado_aprendizaje, nombre, codigo, id_asignatura
                    FROM {$this->table} 
                    WHERE id_resultado_aprendizaje = :idRdo";

            $statement = $this->db->prepare($query);

            $statement->execute([':idRdo' => $id_resultado_aprendizaje]);

            $statement->setFetchMode(PDO::FETCH_CLASS, 'ResultadoAprendizaje');

            $resultadoAprendizaje = $statement->fetch();

            if ($resultadoAprendizaje == false) {
                $resultadoAprendizaje = null;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            return $resultadoAprendizaje;
        }
    }

    public function readAll(): ?array
    {
        $resultadosAprendizaje = null;
        try {
            $this->db = Database::getConnection();

            $query = "SELECT id_resultado_aprendizaje, nombre, codigo, id_asignatura
                    FROM {$this->table}";

            $statement = $this->db->query($query);

            $statement->setFetchMode(PDO::FETCH_CLASS, 'ResultadoAprendizaje');

            $resultadosAprendizaje = $statement->fetchAll();



        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            return $resultadosAprendizaje ?: [];
        }
    }

    public function readBySubject(int $id_asignatura): ?array
    {
        $resultadosAprendizaje = null;
        try {
            $this->db = Database::getConnection();

            $query = "SELECT id_resultado_aprendizaje, nombre, codigo, id_asignatura
                    FROM {$this->table} 
                    WHERE id_asignatura = :id_asignatura";

            $statement = $this->db->prepare($query);

            $statement->execute([":id_asignatura" => $id_asignatura]);

            $statement->setFetchMode(PDO::FETCH_CLASS, 'ResultadoAprendizaje');

            $resultadosAprendizaje = $statement->fetchAll();



        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            return $resultadosAprendizaje ?: [];
        }
    }

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
                SET $setClause WHERE id_resultado_aprendizaje = :id";

            $statement = $this->db->prepare($query);

            $result = $statement->execute($params);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            return $result;
        }
    }

    public function delete($id_resultado_aprendizaje): bool
    {
        $result = false;
        try {
            $this->db = Database::getConnection();

            $query = "DELETE FROM {$this->table} WHERE id_resultado_aprendizaje = :id";

            $statement = $this->db->prepare($query);
            $result = $statement->execute([":id" => $id_resultado_aprendizaje]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            return $result;
        }
    }

}






?>