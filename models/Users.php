<?php

// users est un enfant de Database 
class Users extends Database
{
    private int $_users_id;
    private string $_users_mail;
    private string $_users_password;
    private int $_role_id_role;

    public function getUsersId()
    {
        return $this->_users_id;
    }
    public function setUsersId(int $id)
    {
        $this->_users_id = $id;
    }

    public function getUsersMail()
    {
        return $this->_users_mail;
    }
    public function setUsersMail(string $mail)
    {
        $this->_users_mail = $mail;
    }

    public function getUsersPassword()
    {
        return $this->_users_password;
    }
    public function setUsersPassword(string $password)
    {
        $this->_users_password = $password;
    }

    public function getRoleIdRole()
    {
        return $this->_role_id_role;
    }
    public function setRoleIdRole(int $roleId)
    {
        $this->_role_id_role = $roleId;
    }

    /**fonction permettant de savoir si un mail est présent dans la table users
     * 
     * @param $mail : mail à rechercher 
     * @return boolean 
     */
    public function checkIfMailExists(string $mail)
    {
        // pdo est natif comme et prepare et les autres fonctions existent
        //    création d'une instance pdo viat la fonction du parent
        $pdo = parent::connectDb();

        // j'écrite la requete me peremettant d'aller chercher le mail dans la table users
        // je met en place un marqueur nomonatif mail 
        $sql = "SELECT `users_mail` FROM `users` WHERE `users_mail`= :mail";

        // je prépare la requete que je stock dans query à laide de la méthode ->prepare
        $query = $pdo->prepare($sql);

        // je lie la valeur du parametre mail au marqueru nominatif mail à laid de la methodde bindvalue
        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        // une fois le mail récupéré j'exécute la requete à l'aide de la methode exécute
        $query->execute();

        // met fecthAll car va retourner un tableau vide avec les en têtes si ne trouve rien, fetch si ne trouve rien ne retourne rien
        $result = $query->fetchAll();


        // je fais un test pour savoir si result est vide 
        if (count($result) != 0) {
            return true;
        } else {
            return false;
        }
    }

    /**Fonction permettant de récupérer les infos présentes dans la table users selon le mail
     * 
     * 
     */
    public function getInfosUsers(string $mail): array
    {
        $pdo = parent::connectDb();

        // je récupère la requete me permettant d'aller chercher toutes les info dans la tables users. 
        $sql = "SELECT * FROM `users` WHERE `users_mail`= :mail";

        $query = $pdo->prepare($sql);

        $query->bindValue(':mail', $mail, PDO::PARAM_STR);

        $query->execute();

        // je stock dans $result les données récupérées à l'aide de la méthode fetch. il s'agit d'un tableau assos de type clef valeur.
        // fetch permet d'aller chercher toutes les info liées à users. 
        $result = $query->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    /**
     * Fonction permettant d'ajouter un user 
     */
    public function addUsers(string $users_mail, string $users_password, int $role_id_role): void
    {
        $pdo = parent::connectDb();
        $sql = "INSERT INTO `users` (`users_mail`, `users_password`, `role_id_role`)
        values (:users_mail, :users_password, :role_id_role) ";

        $query = $pdo->prepare($sql);

        $query->bindValue(':users_mail',  $users_mail, PDO::PARAM_STR);
        $query->bindValue(':users_password',  $users_password, PDO::PARAM_STR);
        $query->bindValue(':role_id_role',  $role_id_role, PDO::PARAM_STR);

        $query->execute();
    }

    /**
     * Fonction permettant de modifier un user
     */
    public function modifyUser($users_mail, $users_password, $role_id_role, $users_id): array
    {
        $pdo = parent::connectDb();

        $sql = "UPDATE users set users_mail =:users_mail, users_password=:users_password, role_id_role=:role_id_role WHERE users_id=:users_id";

        $query = $pdo->prepare($sql);

        $query->bindValue(':users_mail', $users_mail, PDO::PARAM_STR);
        $query->bindValue(':users_password', $users_password, PDO::PARAM_STR);
        $query->bindValue(':role_id_role', $role_id_role, PDO::PARAM_STR);
        $query->bindValue(':users_id', $users_id, PDO::PARAM_STR);

        $query->execute();

        $result = $query->fetchall();
        return $result;
    }

    public function getAllUsers(): array
    {
        $pdo = parent::connectDb();
        $sql = "SELECT * FROM `users`";
        $query = $pdo->query($sql);
        // query exécute la requete , ne récupère aucune donnée. execute quand récupère les données et avec prepare. protège des injections sql. permet de ne pas mettre par ex des caractères html et sql 
        $result = $query->fetchall();
        return $result;
    }
}
