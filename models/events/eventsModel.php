<?php

namespace models\events;

use models\Database;


class EventsModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }


    public function getAllEvents()
    {
        try {
            $stmt = $this->db->prepare("SELECT * FROM event_tags LEFT JOIN events ON events.id = event_tags.event_id LEFT JOIN tags ON tags.id = event_tags.tag_id");
            // $stmt->bindParam(':user_id', $user_id, \PDO::PARAM_INT);
            $stmt->execute();
    
            $events = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $events[] = $row;
            }

            //tte($events);
            return $events;
        } catch (\PDOException $e) {

            return false;
        }
    }
   
    public function getEventsById($event_id)
    {
        $query = "SELECT * FROM album_event LEFT JOIN events ON events.id = album_event.event_id LEFT JOIN albums ON albums.id = album_event.album_id where event_id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$event_id]);
            $events = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $events[] = $row;
            };

            return $events ? $events : false;
        } catch (\PDOException $e) {
            return false;
        }
    }


    public function createEvents($events_name, $events_description, $user_id, $tags)
    {
   
       // tte($tags);
        $query = "INSERT INTO events (event_name, event_description, user_id) VALUES (?, ?, ?)";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$events_name, $events_description, $user_id]);


            $events_id = $this->db->lastInsertId();

            // Вставляем теги для текущего изображения
            $stmtTag = $this->db->prepare("INSERT INTO event_tags (event_id, tag_id) VALUES (?, ?)");
            foreach ($tags as $tag_id) {
                $stmtTag->execute([$events_id, $tag_id]);
            }
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function createAlbum($album_name, $album_description, $event)
    {
   
       // tte($album_description);
        $query = "INSERT INTO albums (album_name, album_description) VALUES (?, ?)";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$album_name, $album_description]);


            $albums_id = $this->db->lastInsertId();

            $stmtAE = $this->db->prepare("INSERT INTO album_event (event_id, album_id) VALUES (?, ?)");
            $stmtAE->execute([$event, $albums_id]);
            
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
    
}
