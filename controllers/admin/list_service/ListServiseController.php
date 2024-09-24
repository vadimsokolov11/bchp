<?php
namespace controllers\admin\list_service;

use models\list_servies\ListServiesModel;
use models\comment\CommentModel;


class ListServiseController {
    public function index() {

        $list_servies = new ListServiesModel();
        $list_servies = $list_servies->getAllListServies();
        $sessionData = $_SESSION;
    //  tte($list_servies);
   

        include 'app/views/admin_views/list_service/index.php';
    }

    public function create(){
      
        include 'app/views/admin_views/list_service/create.php';
    }

    public function store(){
        
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/img/uploads_img/';

        if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['status'])){
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);
            $status = trim($_POST['status']);
            

            if (empty($content)) {
                echo "Role name is required!";
                return;
            }

            if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
                $avatar_path = $upload_dir . basename($_FILES['img']['name']); // путь куда сохранить файл
                move_uploaded_file($_FILES['img']['tmp_name'], $avatar_path); // перемещаем файл в папку uploads
                $img = '/img/uploads_img/' . basename($_FILES['img']['name']); // путь который передается в бд
                // Продолжайте обработку и сохранение информации о пользователе
            } else {
                // Логика для случаев, когда загрузка файла не прошла успешно
                echo "Ошибка загрузки файла 'img'.";
            }
            $list_servies = new ListServiesModel();
            $list_servies->createListServies($title, $content, $status, $img);
        }
       
        header("Location: /admin/list_service");
    }

    public function edit($params){
     
        $list_servies = new ListServiesModel();
        $list_servies = $list_servies->getListServiesById($params['id']);
// tte($servies);
        if(!$list_servies){
            echo "Role not found";
            return;
        }

        include 'app/views/admin_views/list_service/edit.php';
    }

    public function update($params){
       
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/img/uploads_img/';

        if(isset($params['id']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['status'])){
            $id = trim($params['id']);
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);
            $status = trim($_POST['status']);

            if (empty($title)) {
                echo "Role name is required";
                return;
            }
            if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
                $avatar_path = $upload_dir . basename($_FILES['img']['name']); // путь куда сохранить файл
                move_uploaded_file($_FILES['img']['tmp_name'], $avatar_path); // перемещаем файл в папку uploads
                $img = '/img/uploads_img/' . basename($_FILES['img']['name']); // путь который передается в бд
                // Продолжайте обработку и сохранение информации о пользователе
            } else {
                // Логика для случаев, когда загрузка файла не прошла успешно
                echo "Ошибка загрузки файла 'img'.";
            }
            $list_servies = new ListServiesModel();
            $list_servies->updateListServies($id, $title, $content, $status, $img);
        }
        
        header("Location: /admin/list_service");
    }

    public function delete($params){
       
        $list_servies = new ListServiesModel();
        $list_servies->deleteListServies($params['id']);
       
        header("Location: /admin/list_service");
    }
}
