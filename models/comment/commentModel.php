<?php

namespace models\comment;

use models\Database;


class CommentModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }


    public function getAllComment()
    {

        try {
            $stmt = $this->db->query("SELECT * FROM comment");
            $comment = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $comment[] = $row;
            }
            return $comment;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getAllCommentUser()
    {

        try {
            $stmt = $this->db->query("SELECT * FROM comment where status = 1");
            $comment = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $comment[] = $row;
            }
            return $comment;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getAllCommentCount()
    {
        try {
            // Выполняем запрос для получения всех записей из таблицы comment
            $stmt = $this->db->query("SELECT * FROM comment");
            $comment = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $comment[] = $row;
            }

            // Подсчитываем количество записей
            $count = count($comment);

            // Возвращаем ассоциативный массив с данными и количеством записей
            return [
                'count' => $count,
            ];
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getCommentById($id)
    {
        $query = "SELECT * FROM comment WHERE id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            $comment = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $comment ? $comment : false;
        } catch (\PDOException $e) {
            return false;
        }
    }


    public function createComment($FIO, $img, $text, $status)
    {

        // tte($img);
        $query = "INSERT INTO comment (FIO, img, text, status) VALUES (?, ?, ?, ?)";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$FIO, $img, $text, $status]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }


    public function updateComment($id, $FIO, $img, $text, $status)
    {


        $query = "UPDATE comment SET FIO = ?, img = ?, text = ?, status = ? WHERE id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$FIO, $img, $text, $status, $id]);

            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function deleteComment($id)
    {
        $query = "DELETE FROM comment WHERE id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
