<?php

class Patient extends DataBase
{
    private $_patient_id;
    private $_patient_lastname;
    private $_patient_firstname;
    private $_patient_phoneNumber;
    private $_patient_mail;
    private $_patient_address;

    public function getUserId()
    {
        return $this->_patient_id;
    }
    public function setUserId(int $id)
    {
        $this->_patient_id = $id;
    }

    public function getUserLastName()
    {
        return $this->_patient_lastname;
    }
    public function setUserLastName(string $lastname)
    {
        $this->_patient_lastname = $lastname;
    }

    public function getUserFirsttName()
    {
        return $this->_patient_firstname;
    }
    public function setUserFirstName(string $firstname)
    {
        $this->_patient_firstname = $firstname;
    }

    public function getUserPhoneNumber()
    {
        return $this->_patient_phoneNumber;
    }
    public function setUserPhoneNumber(string $phoneNumber)
    {
        $this->_patient_phoneNumber = $phoneNumber;
    }

    public function getUserAddress()
    {
        return $this->_patient_mail;
    }
    public function setUserAddress(string $address)
    {
        $this->_patient_address = $address;
    }

    public function getUserMail()
    {
        return $this->_patient_address;
    }
    public function setUserMail(string $mail)
    {
        $this->_patient_mail = $mail;
    }

    public function addPatient(string $lastname, string $firstname, string $phoneNumber, string $address, string $mail): void
    {
        $pdo = parent::connectDb();
        $sql = "INSERT INTO `patients` (`patients_lastname`,  `patients_firstname`,  `patients_phonenumber`,  `patients_address`,  `patients_mail`)
        values ( :lastname,  :firstname,  :phoneNumber,  :address,  :mail) ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':lastname',  $lastname, PDO::PARAM_STR);
        $query->bindValue(':firstname',  $firstname, PDO::PARAM_STR);
        $query->bindValue(':phoneNumber',  $phoneNumber, PDO::PARAM_STR);
        $query->bindValue(':address',  $address, PDO::PARAM_STR);
        $query->bindValue(':mail',  $mail, PDO::PARAM_STR);

        $query->execute();
    }

    public function getallPatients(): array
    {
        $pdo = parent::connectDb();
        $sql = "SELECT * FROM `patients`";
        $query = $pdo->query($sql);
        // query exécute la requete , ne récupère aucune donnée. execute quand récupère les données et avec prepare. protège des injections sql. permet de ne pas mettre par ex des caractères html et sql 
        $result = $query->fetchall();
        return $result;
    }

    public function getSpecificPatient($patients_id): array
    {
        $pdo = parent::connectDb();

        $sql = "SELECT * from `patients` where `patients_id`=:patients_id";

        $query = $pdo->prepare($sql);

        $query->bindValue(':patients_id', $patients_id, PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchall();
        return $result;
    }
}
