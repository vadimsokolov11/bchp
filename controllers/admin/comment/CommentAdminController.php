<?php

namespace controllers\admin\comment;

use models\comment\CommentModel;

class CommentAdminController
{
    public function index()
    {

        $comment = new CommentModel();
        $comment = $comment->getAllComment();
        // tte($comment);
        $sessionData = $_SESSION; // выводит данные из сессии (на данный момент username, user_role, user_id, user_email)
        include 'app/views/admin_views/comment/index.php';
    }


    public function create()
    {

        include 'app/views/admin_views/comment/create.php';
    }

    public function store()
    {
        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/img/uploads_img_comment/';

        if (isset($_POST['FIO']) && isset($_POST['text']) && isset($_POST['status'])) {
            $FIO = trim($_POST['FIO']);
            $text = trim($_POST['text']);
            $status = trim($_POST['status']);

            if (empty($text)) {
                echo "Role name is required!";
                return;
            }
            if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
                $avatar_path = $upload_dir . basename($_FILES['img']['name']); // путь куда сохранить файл
                move_uploaded_file($_FILES['img']['tmp_name'], $avatar_path); // перемещаем файл в папку uploads
                $img = '/img/uploads_img_comment/' . basename($_FILES['img']['name']); // путь который передается в бд
                // Продолжайте обработку и сохранение информации о пользователе
            } else {
                // Логика для случаев, когда загрузка файла не прошла успешно
                echo "Ошибка загрузки файла 'img'.";
            }

            $comment = new CommentModel();
            $comment->createComment($FIO, $img, $text, $status);
        }

        header("Location: /admin/comment");
    }

    public function edit($params)
    {

        $comment = new CommentModel();
        $comment = $comment->getCommentById($params['id']);

        if (!$comment) {
            echo "Role not found";
            return;
        }

        include 'app/views/admin_views/comment/edit.php';
    }

    public function update($params)
    {

        $upload_dir = $_SERVER['DOCUMENT_ROOT'] . '/img/uploads_img_comment_ava/';

        if (isset($params['id']) && isset($_POST['FIO']) && isset($_POST['text']) && isset($_POST['status'])) {
            $id = trim($params['id']);
            $FIO = trim($_POST['FIO']);
            $text = trim($_POST['text']);
            $status = trim($_POST['status']);


            if (empty($text)) {
                echo "Role name is required";
                return;
            }
            if (isset($_FILES['img']) && $_FILES['img']['error'] === 0) {
                $avatar_path = $upload_dir . basename($_FILES['img']['name']); // путь куда сохранить файл
                move_uploaded_file($_FILES['img']['tmp_name'], $avatar_path); // перемещаем файл в папку uploads
                $img = '/img/uploads_img_comment_ava/' . basename($_FILES['img']['name']); // путь который передается в бд
                // Продолжайте обработку и сохранение информации о пользователе
            } else {
                // Логика для случаев, когда загрузка файла не прошла успешно
                echo "Ошибка загрузки файла 'img'.";
            }

            $oq = new CommentModel();
            $oq->updateComment($id, $FIO, $img, $text, $status);
        }

        header("Location: /admin/comment");
    }

    public function delete($params)
    {

        $comment = new CommentModel();
        $comment->deleteComment($params['id']);

        header("Location: /admin/comment");
    }
}
