<?php

namespace models\posts;

use models\Database;


class PostsModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }


    public function getMyPosts()
    {

        try {
            $stmt = $this->db->query("SELECT * FROM posts LEFT JOIN albums ON albums.id = posts.id_album;");
            $posts = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $posts[] = $row;
            }
            return $posts;
        } catch (\PDOException $e) {
            return false;
        }
    }



    public function getAllTags()
    {

        try {
            $stmt = $this->db->query("SELECT * FROM tags");
            $tags = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $tags[] = $row;
            }
            return $tags;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function searchTags($id_tags) {

        try {
            $stmt = $this->db->prepare("
                SELECT * 
                FROM photo_tags 
                LEFT JOIN posts ON posts.id = photo_tags.img_id 
                LEFT JOIN tags ON tags.id = photo_tags.tag_id 
                LEFT JOIN albums ON albums.id = posts.id_album 
                WHERE tags.id = ?
            ");
            $stmt->execute([$id_tags]);
            
            $posts = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $posts[] = $row;
            }
    
            // Функция tte() должна быть определена. Это, вероятно, отладочная функция.
            tte($posts);
            
            return $posts;
        } catch (\PDOException $e) {
            // Логирование или обработка ошибки
            echo "Ошибка выполнения запроса: " . $e->getMessage();
            return false;
        }
    }

    public function createPosts($user_id, $tags, $path_img, $album_id)
    {

       //  tte($album_id);
        $tag_ids = $tags;
    
        $query = "INSERT INTO posts (id_user, id_album, path_img) VALUES (?, ?, ?)";
        
        try {
            // Подготовим выражение заранее
            $stmtPost = $this->db->prepare($query);
            
            // Вставляем каждое изображение по отдельности
            foreach ($path_img as $imgPath) {
                // Выполняем запрос для текущего изображения
                $stmtPost->execute([$user_id, $album_id, $imgPath]);
                
                // Получаем ID только что вставленной записи
                $photo_id = $this->db->lastInsertId();
                
                // Вставляем теги для текущего изображения
                $stmtTag = $this->db->prepare("INSERT INTO photo_tags (img_id, tag_id) VALUES (?, ?)");
                foreach ($tag_ids as $tag_id) {
                    $stmtTag->execute([$photo_id, $tag_id]);
                }
            }
   
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }


    public function updateNews($id, $title, $description, $content, $img, $status)
    {
        $query = "UPDATE news SET title = ?, description = ?, content = ?, img = ?, status = ? WHERE id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$title, $description, $content, $img, $status, $id]);

            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function deletePost($id)
    {
        $query = "DELETE FROM photo_tags WHERE id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
