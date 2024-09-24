<?php

namespace controllers\main;


use models\users\User;
use models\comment\CommentModel;
use models\list_servies\ListServiesModel;
use models\posts\PostsModel;
use models\oq\OqModel;
use models\orders\OrdersModel;
use models\servies\ServiesModel;
use models\Check;

class MainController
{

    private $check;

    public function __construct()
    {
        $userRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;
        $this->check = new Check($userRole);
    }

    public function index()
    {

        // tte($_SESSION);
        $sessionData = $_SESSION; // выводит данные из сессии (на данный момент username, user_role, user_id, user_email)
        $comment = new CommentModel();
        $comment = $comment->getAllCommentCount();

        $list_servies = new ListServiesModel();
        $list_servies = $list_servies->getAllListServiesCount();

        $news = new PostsModel();
        $news = $news->getAllNewsCount();

        $oq = new OqModel();
        $oq = $oq->getAllOqCount();

        $orders = new OrdersModel();
        $orders = $orders->getAllOrdersCount();

        $servies = new ServiesModel();
        $servies = $servies->getAllServiesCount();

        $users = new User();
        $users = $users->getAllUsersCount();
        // tte($comment);
        // tte($_SESSION); // отладчик (что выводит любая переменная)
        include 'app/views/admin_views/main/index.php';
    }
}
