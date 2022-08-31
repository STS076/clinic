<?php

class Appointment extends Database
{

    private int $_rendezvous_id;
    private string $_rendezvous_date;
    private string $_rendezvous_hour;
    private string $_rendezvous_description;
    private int $_patients_id_patients;
    private int $_doctors_id_doctors;

    public function get_rendezvous_id()
    {
        return $this->_rendezvous_id;
    }
    public function set_rendezvous_id($rendezvous_id)
    {
        $this->_rendezvous_id = $rendezvous_id;
    }

    public function get_rendezvous_date()
    {
        return $this->_rendezvous_date;
    }
    public function set_rendezvous_date($rendezvous_date)
    {
        $this->_rendezvous_date = $rendezvous_date;
    }

    public function get_rendezvous_hour()
    {
        return $this->_rendezvous_hour;
    }
    public function set_rendezvous_hour($rendezvous_hour)
    {
        $this->_rendezvous_hour = $rendezvous_hour;
    }

    public function get_rendezvous_description()
    {
        return $this->_rendezvous_description;
    }
    public function set_rendezvous_description($rendezvous_description)
    {
        $this->_rendezvous_description = $rendezvous_description;
    }

    public function get_patients_id_patients()
    {
        return $this->_patients_id_patients;
    }
    public function set_patients_id_patients($patients_id_patients)
    {
        $this->_patients_id_patients = $patients_id_patients;
    }


    public function get_doctors_id_doctors()
    {
        return $this->_doctors_id_doctors;
    }
    public function set_doctors_id_doctors($doctors_id_doctors)
    {
        $this->_doctors_id_doctors = $doctors_id_doctors;
    }

    /**
     * Fonction pour ajouter un RDV
     */
    public function addAppointment(string $rendezvous_date, string $rendezvous_hour, string $rendezvous_description, string $patients_id_patients, string $doctors_id_doctors): void
    {
        $pdo = parent::connectDb();
        $sql = "INSERT INTO `rendezvous` (rendezvous_date, rendezvous_hour, rendezvous_description, patients_id_patients, doctors_id_doctors)
        values (:rendezvous_date, :rendezvous_hour, :rendezvous_description, :patients_id_patients, :doctors_id_doctors) ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':rendezvous_date',  $rendezvous_date, PDO::PARAM_STR);
        $query->bindValue(':rendezvous_hour',  $rendezvous_hour, PDO::PARAM_STR);
        $query->bindValue(':rendezvous_description',  $rendezvous_description, PDO::PARAM_STR);
        $query->bindValue(':patients_id_patients',  $patients_id_patients, PDO::PARAM_STR);
        $query->bindValue(':doctors_id_doctors',  $doctors_id_doctors, PDO::PARAM_STR);

        $query->execute();
    }

    /**
     * Fonction pour récupérer les données de tous les RDV
     */
    public function getAllAppointement(): array
    {
        $pdo = parent::connectDb();

        $sql = "SELECT * from `rendezvous` inner join `patients`  on `patients_id_patients`=`patients_id` inner join `doctors`  on `doctors_id_doctors`=`doctors_id` inner join `medicalspecialities` on `medicalspecialities_id_medicalspecialities`=`medicalspecialities_id` order by `patients_lastname` ";

        $query = $pdo->query($sql);

        $result = $query->fetchall();
        return $result;
    }


    /**
     * Fonction pour récupérer les données de RDV d'un seul médecin par son adresse email et n'afficher que les RDV du médecin en question
     */
    public function getSpecificAppointment($mail): array
    {
        $pdo = parent::connectDb();

        $sql = "SELECT * from `rendezvous` 
        inner join `patients`  
        on `patients_id_patients`=`patients_id` 
        inner join `doctors`  
        on `doctors_id_doctors`=`doctors_id` 
        inner join `medicalspecialities` 
        on `medicalspecialities_id_medicalspecialities`=`medicalspecialities_id` 
        where `doctors_mail`= :users_mail ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':users_mail', $mail, PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchall();
        return $result;
    }

    /**
     * Permet de récupérer les données d'un rdv spécifique d'un patient, permet d'afficher plus d'info sur ce RDV
     */
    public function getAppointementPatient($patients_id): array
    {
        $pdo = parent::connectDb();

        $sql = "SELECT * from `rendezvous` 
        inner join `patients`  
        on `patients_id_patients`=`patients_id` 
        inner join `doctors`  
        on `doctors_id_doctors`=`doctors_id` 
        inner join `medicalspecialities` 
        on `medicalspecialities_id_medicalspecialities`=`medicalspecialities_id` 
        where patients_id_patients=patients_id";

        $query = $pdo->prepare($sql);

        $query->bindValue(':patients_id', $patients_id, PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchall();
        return $result;
    }
}
