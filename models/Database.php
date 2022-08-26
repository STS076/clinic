<?php
// Création d'une classe DataBase
class DataBase
{
    // je définis des attributs privées qui va récupérer la valeur des constantes du fichier config.php
    private string $_dbname = DBNAME;
    private string $_dbuser = DBUSER;
    private string $_dbpassword = DBPASSWORD;

    /**
     * Fonction permettant de se connecter à la base de données
     * @return PDO 
     * la fonction va retourner un objet PDO
     */
    protected function connectDb()
    {
        try {
            // j'instancie un nouvel objet selon la class PDO
            $database = new PDO("mysql:host=localhost;dbname=" . $this->_dbname . ";charset=utf8", $this->_dbuser, $this->_dbpassword);
            // j'active les erreurs et les exceptions pour permettre de débugger uniquement en developpement
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // si tout est ok, je retourne l'objet $database
            return $database;
        } catch (Exception $errorMessage) {
            // si erreur, on affiche le message 
            die('Erreur PDO : ' . $errorMessage->getMessage());
        }
    }
}
