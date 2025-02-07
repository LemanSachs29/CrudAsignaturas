<?php

require_once 'Database.php';
require_once 'Asignatura.php';

class AsignaturaController
{

    //Database connection
    private $db = null;

    private $table = "asignaturas";

    //Recives an asignatura id and returns null or an instance of asignatura whith the result
    public function findById($id)
    {

        $myAsignatura = null;

        try {
            //Make a db connection
            $this->db = Database::getConnetion();

            //Set SQL prepared query
            $query = $this->db->prepare("SELECT id_asignatura, nombre, descripcion 
                                FROM $this->table 
                                WHERE id_asignatura = :id");

            //Set query params
            $query->bindParam(':id', $id, PDO::PARAM_INT);

            //SQL execute
            $query->execute();

            $result = $query->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($result)) {
                $myAsignatura = new Asignatura();
                $myAsignatura->setId($result[0]['id_asignatura']);
                $myAsignatura->setNombre($result[0]['nombre']);
                $myAsignatura->setDescripcion($result[0]['descripcion']);
            }


        } catch (PDOException $e) {
            echo $e->getMessage();
        } finally {
            $this->db = Database::closeConnection($this->db);
            return $myAsignatura; //Return result even there's no data
        }
    }

    public function listAll()
    {

        $asignaturaList = null;

        try {
            //Make a db connection
            $this->db = Database::getConnetion();

            $stmnt = 'SELECT id_asignatura, nombre, descripcion, from $this->table';

            //Execute query and returning an associative array
            $asignaturaList = $this->db->query($stmnt)->fetchAll(PDO::FETCH_ASSOC);

            if (!empty($result)) {
                
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }finally{
            $this-> db = Database::closeConnection($this->db);
            return $asignaturaList;
        }
    }
}

?>