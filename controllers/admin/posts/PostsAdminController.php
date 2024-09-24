<?php

namespace controllers\admin\posts;

use models\posts\PostsModel;

class PostsAdminController
{
    public function index()
    {
        
        // header('Access-Control-Allow-Origin: http://localhost/admin/posts'); // Задайте нужный URL

        // // Установите другие необходимые заголовки, если нужно
        // header('Content-Type: application/json');
        // // Если вы хотите поддерживать другие методы и заголовки, добавьте их следующим образом:
        // header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        // header('Access-Control-Allow-Headers: Content-Type, Authorization');
        $posts = new PostsModel();
        $posts = $posts->getMyPosts();

        include 'app/views/admin_views/posts/index.php';
        $sessionData = $_SESSION; // выводит данные из сессии (на данный момент username, user_role, user_id, user_email)
    }

    public function search(){

        $id_tags = $_POST['tags'];
        $posts = new PostsModel();
        $posts->searchTags($id_tags);

        header("Location: /admin/posts");
    }

    public function create()
    {
        $tags = new PostsModel();
        $tags = $tags->getAllTags();

        $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        $host = $_SERVER['HTTP_HOST'];
        $path = $_SERVER['REQUEST_URI'];
        
        // Формируем полный URL
        $url = $protocol . $host . $path;
        
        // Получаем текст после последнего /
        $album_id = basename($url);
        $event_id = $_POST['event'];
        //tte($event_id);

        //  tte($tags);
        include 'app/views/admin_views/posts/create.php';
    }

    public function store()
    {

        $album_id = $_POST['album_id'];
       
        // $img_name = $_POST['img_name'];
        // $description = trim($_POST['description']);
        $tags = $_POST['tags'] ?? [];
        $user_id = $_SESSION['user_id'];



        $path_img = []; // Массив для хранения путей к загруженным файлам
        $uploadDirectory = '/img/uploads_img_news/'; // Директория для загрузки файлов

        // Проверяем и создаем директорию, если она не существует
        if (!is_dir($uploadDirectory)) {
            mkdir($uploadDirectory, 0755, true);
        }

        foreach ($_FILES['img']['tmp_name'] as $key => $tmpName) {
            // Получаем имя файла
            $fileName = basename($_FILES['img']['name'][$key]);
            // Формируем полный путь для сохранения файла
            $filePath = $uploadDirectory . $fileName;

            // Проверяем успешность загрузки и перемещаем файл
            if (move_uploaded_file($tmpName, $filePath)) {
                $path_img[] = $filePath; // Добавляем путь к массиву
            } else {
                echo "Ошибка при загрузке файла: " . $_FILES['img']['name'][$key];
            }
        }

        
     //   tte($path_img);
        $posts = new PostsModel();
        $posts->createPosts($user_id, $tags, $path_img, $album_id);


        header("Location: /admin/posts");
    }

    

    public function update($params)
    {

        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/img/uploads_img_news/';

        if (isset($params['id']) && isset($_POST['title']) && isset($_POST['description']) && isset($_POST['content']) && isset($_POST['status'])) {
            $id = trim($params['id']);
            $title = trim($_POST['title']);
            $description = trim($_POST['description']);
            $content = trim($_POST['content']);

            $status = trim($_POST['status']);

            if (empty($title)) {
                echo "Role name is required";
                return;
            }
            if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
                $avatar_path = $upload_dir . basename($_FILES['img']['name']); // путь куда сохранить файл
                move_uploaded_file($_FILES['img']['tmp_name'], $avatar_path); // перемещаем файл в папку uploads
                $img = '/img/uploads_img_news/' . basename($_FILES['img']['name']); // путь который передается в бд
                // Продолжайте обработку и сохранение информации о пользователе
            } else {
                // Логика для случаев, когда загрузка файла не прошла успешно
                echo "Ошибка загрузки файла 'img'.";
            }
            $news = new PostsModel();
            $news->updateNews($id, $title, $description, $content, $img, $status);
        }

        header("Location: /admin/news");
    }

    public function delete($params)
    {
        // tte($params['id']);
        $post = new PostsModel();
        $post->deletePost($params['id']);


        header("Location: /admin/posts");
    }
}
