<?php
namespace models\contact;

use models\Database;


class ContactModel {
    private $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();

    }
    public function contact()
    {
        try {
            $stmt = $this->db->query("SELECT * FROM contact");

            $contact = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $contact[] = $row;
            }
            return $contact;
        } catch (\PDOException $e) {
            return false;
        }
    }

   
    public function createMessage($name, $email, $content) {
        //    tte($content);
        $query = "INSERT INTO letter (name, email, content) VALUES (?, ?, ?)";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$name, $email, $content]);
            return true;
        } catch(\PDOException $e) {
            return false;
        }
    }

}
