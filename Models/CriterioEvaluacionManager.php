<?php

require_once 'Database.php';
require_once 'CriterioEvaluacion.php';

class CriterioEvaluacionManager
{
    private PDO $db;
    private string $table = "criterios_evaluacion";

    public function create(CriterioEvaluacion $criterioEvaluacion): bool
    {
        $result = false;

        try {
            $this->db = Database::getConnection();

            $query = "INSERT INTO {$this->table} (
            id_resultado_aprendizaje, 
            descripcion, 
            orden
            )
            VALUES (
            :id_resultado_aprendizaje, 
            :descripcion,  
            :orden)";

            $statement = $this->db->prepare($query);

            $result = $statement->execute([
                ":id_resultado_aprendizaje" => $criterioEvaluacion->getId_resultado_aprendizaje(),
                ":descripcion" => $criterioEvaluacion->getDescripcion(),
                ":orden" => $criterioEvaluacion->getOrden()
            ]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            return $result;
        }
    }

    public function read(int $id_criterio): ?CriterioEvaluacion
    {
        $criterioEvaluacion = null;

        try {
            $this->db = Database::getConnection();

            $query = "SELECT id_criterio, id_resultado_aprendizaje, descripcion, orden
                    FROM {$this->table} 
                    WHERE id_criterio = :id_criterio";

            $statement = $this->db->prepare($query);

            $statement->execute([':id_criterio' => $id_criterio]);

            $statement->setFetchMode(PDO::FETCH_CLASS, 'CriterioEvaluacion');

            $criterioEvaluacion = $statement->fetch();

            if ($criterioEvaluacion == false) {
                $criterioEvaluacion = null;
            }

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            return $criterioEvaluacion;
        }
    }

    public function readAll(): ?array
    {
        $criteriosEvaluacion = null;
        try {
            $this->db = Database::getConnection();

            $query = "SELECT id_criterio, id_resultado_aprendizaje, descripcion, orden
                    FROM {$this->table}";

            $statement = $this->db->query($query);

            $statement->setFetchMode(PDO::FETCH_CLASS, 'CriterioEvaluacion');

            $criteriosEvaluacion = $statement->fetchAll();



        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            return $criteriosEvaluacion ?: [];
        }
    }

    public function readByRA(int $id_resultado_aprendizaje): ?array
    {
        $criteriosEvaluacion = null;
        try {
            $this->db = Database::getConnection();

            $query = "SELECT 
            id_criterio, 
            id_resultado_aprendizaje, 
            descripcion, 
            orden
                    FROM {$this->table} 
                    WHERE 
                    id_resultado_aprendizaje = :id_resultado_aprendizaje ORDER BY orden";

            $statement = $this->db->prepare($query);

            $statement->execute([":id_resultado_aprendizaje" => $id_resultado_aprendizaje]);

            $statement->setFetchMode(PDO::FETCH_CLASS, 'CriterioEvaluacion');

            $criteriosEvaluacion = $statement->fetchAll();



        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            return $criteriosEvaluacion ?: [];
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
                SET $setClause WHERE id_criterio = :id";

            $statement = $this->db->prepare($query);

            $result = $statement->execute($params);

        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            return $result;
        }
    }

    public function delete($id_criterio): bool
    {
        $result = false;
        try {

            $this->db = Database::getConnection();

            $query = "DELETE FROM {$this->table} WHERE id_criterio = :id_criterio";

            $statement = $this->db->prepare($query);
            $result = $statement->execute([":id_criterio" => $id_criterio]);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        } finally {
            return $result;
        }
    }

}
?>