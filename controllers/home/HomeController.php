<?php

namespace controllers\home;

use models\comment\CommentModel;
use models\news\NewsModel;
use models\servies\ServiesModel;
use models\list_servies\ListServiesModel;
use models\orders\OrdersModel;


class HomeController
{
    public function index()
    {

        $comment = new CommentModel();
        $comment = $comment->getAllCommentUser();

        $news = new NewsModel();
        $news = $news->getAllNewsUser();

        $servies = new ServiesModel();
        $servies = $servies->getAllServiesUser();


        $list_servies = new ListServiesModel();
        $list_servies = $list_servies->getAllListServiesUser();
        // tte($list_servies);
        include 'app/views/users_views/homeuser/index.php';
    }



    public function store()
    {

        if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['phone']) && isset($_POST['e_mail']) && isset($_POST['address'])) {
            $name = trim($_POST['name']);
            $surname = trim($_POST['surname']);
            $phone = trim($_POST['phone']);
            $e_mail = trim($_POST['e_mail']);
            $address = trim($_POST['address']);


            if (empty($surname)) {
                echo "Role name is required!";
                return;
            }

            $orders = new OrdersModel();
            $orders->createOrders($name, $surname, $phone, $e_mail, $address);
        }

        header("Location: /home");
    }
}
