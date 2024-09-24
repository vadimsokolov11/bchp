<?php

namespace controllers\service;

use models\servies\ServiesModel;
use models\comment\CommentModel;
use models\list_servies\ListServiesModel;

class ServiseController
{
    public function index()
    {

        $servies = new ServiesModel();
        $servies = $servies->getAllServiesUser();

        $comment = new CommentModel();
        $comment = $comment->getAllCommentUser();

        $list_servies = new ListServiesModel();
        $list_servies = $list_servies->getAllListServiesUser();


        include 'app/views/users_views/service/index.php';
    }
}
