<?php

namespace controllers\admin\events;

use models\events\EventsModel;
use models\posts\PostsModel;

class EventsAdminController
{
    public function index()
    {

        // header('Access-Control-Allow-Origin: http://localhost/admin/posts'); // Задайте нужный URL

        // // Установите другие необходимые заголовки, если нужно
        // header('Content-Type: application/json');
        // // Если вы хотите поддерживать другие методы и заголовки, добавьте их следующим образом:
        // header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        // header('Access-Control-Allow-Headers: Content-Type, Authorization');
        // Инициализация модели
        $event_user = new EventsModel();
        
        // Получение user_id из сессии
        // $user_id = $_SESSION['user_id'];
    
        // Получение всех событий для данного пользователя
        $events = $event_user->getAllEvents();
    

        $uniqueEvents = [];

        foreach ($events as $post) {
            $eventId = $post['event_id'];
            $tagName = $post['tag_name'];
            

            // Если запись с таким img_id уже существует, добавляем тег в массив тегов
            if (isset($uniqueEvents[$eventId])) {
                $uniqueEvents[$eventId]['tags'][] = $tagName;
            } else {

                $uniqueEvents[$eventId] = [
                    'id' => $post['id'],
                    'event_id' => $eventId,
                    'event_name' => $post['event_name'],
                    'event_description' => $post['event_description'],
                    'created_at' => $post['created_at'],
                    'tags' => [$tagName],
                   
                ];
            }
        }
      //  echo json_encode($uniqueEvents);
        // Передача массива событий в представление
        include 'app/views/admin_views/events/index.php';
    }


    public function create()
    {

        $tags = new PostsModel();
        $tags = $tags->getAllTags();

        include 'app/views/admin_views/events/create.php';
    }

    public function add(){
 
        $album_name = trim($_POST['album_name']);
        $album_description = trim($_POST['album_description']);
        $event = trim($_POST['event']);

     //   tte($event);

        $album = new EventsModel();
        $album->createAlbum($album_name, $album_description, $event);
        header("Location: /admin/events/edit/" . $event);
       // tte($album_name);
    }

    public function store()
    {
            $events_name = trim($_POST['events_name']);
            $events_description = trim($_POST['events_description']);
            $user_id = $_SESSION['user_id'];
            $tags = $_POST['tags'] ?? [];
           
            
            $events = new EventsModel();
            $events->createEvents($events_name, $events_description, $user_id, $tags);
        
        header("Location: /admin/events");
    }

    public function edit()
    {

        $event_user = new EventsModel();
        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'];
        $path = $_SERVER['REQUEST_URI'];
        
        // Формируем полный URL
        $url = $protocol . $host . $path;
        
        // Получаем текст после последнего /
        $event_id = basename($url);

        $events = $event_user->getEventsById($event_id);
//tte($events);

        include 'app/views/admin_views/events/edit.php';
    }

 
}
