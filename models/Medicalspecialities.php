<?php

class Medical extends Database
{
    private $_medicalspecialities_id; 
    private $_medicalspecialities_name;

    public function get_medicalspecialities_id()
    {
        return $this->_medicalspecialities_id;
    }
    public function set_medicalspecialities_id($medicalspecialities_id)
    {
        $this->_medicalspecialities_id = $medicalspecialities_id;
    }

    public function get_medicalspecialities_name()
    {
        return $this->_medicalspecialities_name;
    }
    public function set_medicalspecialities_name($medicalspecialities_name)
    {
        $this->_medicalspecialities_name = $medicalspecialities_name;
    }

    public function getAllSpecialities(): array
    {
        $pdo = parent::connectDb();
        $sql = "SELECT * FROM `medicalspecialities`";
        $query = $pdo->query($sql);
        $result = $query->fetchall();
        return $result;
    }
}
