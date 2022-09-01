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


    /**
     * fonction pour ajouter un patient
     */
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

    /** fonction pour  récupérer les données de tous les patients pour les afficher 
     * 
     */
    public function getallPatients(): array
    {
        $pdo = parent::connectDb();
        $sql = "SELECT * FROM `patients`";
        $query = $pdo->query($sql);
        // query exécute la requete , ne récupère aucune donnée. execute quand récupère les données et avec prepare. protège des injections sql. permet de ne pas mettre par ex des caractères html et sql 
        $result = $query->fetchall();
        return $result;
    }

    /**
     * Fonction pour récupérer les données d'une seul patient par son id
     * si ne récupère qu'un seul patient pas nécessaire de faire fetchall tableau à deux dimension peut faire seulement fetch
     * seulement fetch si SELECT
     */
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

    /**
     * fonction pour modifier les données d'un patient
     */
    public function modifyPatient($patients_lastname, $patients_firstname, $patients_phonenumber, $patients_address, $patients_mail, $patients_id)
    {
        $pdo = parent::connectDb();

        $sql = "UPDATE patients set patients_lastname =:patients_lastname, patients_firstname=:patients_firstname, patients_phonenumber=:patients_phonenumber, patients_address=:patients_address, patients_mail=:patients_mail WHERE patients_id=:patients_id";

        $query = $pdo->prepare($sql);

        $query->bindValue(':patients_lastname', $patients_lastname, PDO::PARAM_STR);
        $query->bindValue(':patients_firstname', $patients_firstname, PDO::PARAM_STR);
        $query->bindValue(':patients_phonenumber', $patients_phonenumber, PDO::PARAM_STR);
        $query->bindValue(':patients_address', $patients_address, PDO::PARAM_STR);
        $query->bindValue(':patients_mail', $patients_mail, PDO::PARAM_STR);
        $query->bindValue(':patients_id', $patients_id, PDO::PARAM_STR);

        $query->execute();

        // $result = $query->fetchall();
        // return $result;
    }

    /**
     * Fonction pour regarder si le mail existe déjà dans la base de donnée patient lors de la modification d'un patient 
     */
    public function checkIfPatientMailExists($patients_mail)
    {
        $pdo = parent::connectDb();

        $sql = "SELECT `patients_mail` FROM `patients` where `patients_mail` = :patients_mail";

        $query = $pdo->prepare($sql);

        $query->bindValue(':patients_mail', $patients_mail, PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchAll();

        if (count($result) != 0) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePatient($patients_id)
    {
        $pdo = parent::connectDb();

        $sql = "DELETE from patients where patients_id=:patients_id";

        $query = $pdo->prepare($sql);

        $query->bindValue(':patients_id', $patients_id, PDO::PARAM_STR);

        $query->execute();

       
    }
}
