<?php

namespace models\oq;

use models\Database;


class OqModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }


    public function getAllOq()
    {

        try {
            $stmt = $this->db->query("SELECT * FROM ans_to_quest");
            $ans_to_quest = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $ans_to_quest[] = $row;
            }
            return $ans_to_quest;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getAllOqUser()
    {

        try {
            $stmt = $this->db->query("SELECT * FROM ans_to_quest where status = 1");
            $ans_to_quest = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $ans_to_quest[] = $row;
            }
            return $ans_to_quest;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getOqById($id)
    {
        $query = "SELECT * FROM ans_to_quest WHERE id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            $ans_to_quest = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $ans_to_quest ? $ans_to_quest : false;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getAllOqCount()
    {
        try {
            // Выполняем запрос для получения всех записей из таблицы comment
            $stmt = $this->db->query("SELECT * FROM ans_to_quest");
            $ans_to_quest = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $ans_to_quest[] = $row;
            }

            // Подсчитываем количество записей
            $count = count($ans_to_quest);

            // Возвращаем ассоциативный массив с данными и количеством записей
            return [
                'count' => $count,
            ];
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function createOq($title, $content, $status)
    {

        $query = "INSERT INTO ans_to_quest (title, content, status) VALUES (?, ?, ?)";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$title, $content, $status]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }


    public function updateOq($id, $title, $content, $status)
    {


        $query = "UPDATE ans_to_quest SET title = ?, content = ?, status = ? WHERE id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$title, $content, $status, $id]);

            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function deleteOq($id)
    {
        $query = "DELETE FROM ans_to_quest WHERE id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
