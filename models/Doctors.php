<?php

class Doctors extends DataBase {
    private $_doctors_id; 
    private $_doctors_name; 
    private $_doctors_lastname; 
    private $_doctors_phonenumber; 
    private $_doctors_mail; 
    private $_medicalspecialities_id_medicalspecialities;    

    public function get_doctors_id()
    {
        return $this->_doctors_id;
    }
    public function set_doctors_id($doctors_id)
    {
        $this->_doctors_id = $doctors_id;
    }

    public function get_doctors_name()
    {
        return $this->_doctors_name;
    }
    public function set_doctors_name($doctors_name)
    {
        $this->_doctors_name = $doctors_name;
    }

    public function get_doctors_lastname()
    {
        return $this->_doctors_lastname;
    }
    public function set_doctors_lastname($doctors_lastname)
    {
        $this->_doctors_lastname = $doctors_lastname;
    }

    public function getDoctors_phonenumber()
    {
        return $this->_doctors_phonenumber;
    }
    public function setDoctors_phonenumber($doctors_phonenumber)
    {
        $this->_doctors_phonenumber = $doctors_phonenumber;
    }

    public function get_doctors_mail()
    {
        return $this->_doctors_mail;
    }
    public function set_doctors_mail($doctors_mail)
    {
        $this->_doctors_mail = $doctors_mail;
    }

    public function get_medicalspecialities_id_medicalspecialities()
    {
        return $this->_medicalspecialities_id_medicalspecialities;
    }
    public function set_medicalspecialities_id_medicalspecialities($medicalspecialities_id_medicalspecialities)
    {
        $this->_medicalspecialities_id_medicalspecialities = $medicalspecialities_id_medicalspecialities;
    }


    public function addDoctor(string $doctors_name, string $doctors_lastname, string $doctors_phonenumber, string $doctors_mail, int $medicalspecialities_id_medicalspecialities ): void
    {
        $pdo = parent::connectDb();
        $sql = "INSERT INTO `doctors` (`doctors_name`, `doctors_lastname`, `doctors_phonenumber`, `doctors_mail`, `medicalspecialities_id_medicalspecialities`)
        VALUES (:doctors_name, :doctors_lastname, :doctors_phonenumber, :doctors_mail, :medicalspecialities_id_medicalspecialities) ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':doctors_name', $doctors_name, PDO::PARAM_STR);
        $query->bindValue(':doctors_lastname', $doctors_lastname, PDO::PARAM_STR);
        $query->bindValue(':doctors_phonenumber', $doctors_phonenumber, PDO::PARAM_STR);
        $query->bindValue(':doctors_mail', $doctors_mail, PDO::PARAM_STR);
        $query->bindValue(':medicalspecialities_id_medicalspecialities', $medicalspecialities_id_medicalspecialities ,PDO::PARAM_INT);

        $query->execute();
    }

    public function getAllDoctors(): array
    {
        $pdo = parent::connectDb();
        $sql = "SELECT * FROM `medicalspecialities` inner join `doctors` on `medicalspecialities_id_medicalspecialities`= `medicalspecialities_id` order by `doctors_lastname`";
        $query = $pdo->query($sql);
        // query exécute la requete , ne récupère aucune donnée. execute quand récupère les données et avec prepare. protège des injections sql. permet de ne pas mettre par ex des caractères html et sql 
        $result = $query->fetchall();
        return $result;
    }



    public function checkIfDoctorExists( $mail)
    {
        $pdo = parent::connectDb();

        $sql = "SELECT `doctors_mail` FROM `doctors` inner join `users` WHERE `users_mail`=:mail";

        $query = $pdo->prepare($sql);

        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll();

        if (count($result) != 0) {
            return true;
        } else {
            return false;
        }
    }
}