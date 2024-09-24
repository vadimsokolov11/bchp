<?php

namespace models\list_servies;

use models\Database;


class ListServiesModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }


    public function getAllListServies()
    {

        try {
            $stmt = $this->db->query("SELECT * FROM list_service");
            $list_service = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $list_service[] = $row;
            }
            return $list_service;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getAllListServiesUser()
    {

        try {
            $stmt = $this->db->query("SELECT * FROM list_service where status = 1");
            $list_service = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $list_service[] = $row;
            }
            return $list_service;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getAllListServiesCount()
    {
        try {
            // Выполняем запрос для получения всех записей из таблицы comment
            $stmt = $this->db->query("SELECT * FROM list_service");
            $list_service = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $list_service[] = $row;
            }

            // Подсчитываем количество записей
            $count = count($list_service);

            // Возвращаем ассоциативный массив с данными и количеством записей
            return [
                'count' => $count,
            ];
        } catch (\PDOException $e) {
            return false;
        }
    }


    public function getListServiesById($id)
    {
        $query = "SELECT * FROM list_service WHERE id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            $list_service = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $list_service ? $list_service : false;
        } catch (\PDOException $e) {
            return false;
        }
    }


    public function createListServies($title, $content, $status, $img)
    {

        $query = "INSERT INTO list_service (title, content, status, img) VALUES (?, ?, ?, ?)";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$title, $content, $status, $img]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }


    public function updateListServies($id, $title, $content, $status, $img)
    {
        $query = "UPDATE list_service SET title = ?, content = ?, status = ?, img = ? WHERE id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$title, $content, $status, $img, $id]);

            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function deleteListServies($id)
    {
        $query = "DELETE FROM list_service WHERE id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
