<?php

namespace controllers\oq;

use models\oq\OqModel;

use models\comment\CommentModel;

class OqController
{
    public function index()
    {

        $oq = new OqModel();
        $oq = $oq->getAllOqUser();

        $comment = new CommentModel();
        $comment = $comment->getAllCommentUser();
        include 'app/views/users_views/oq/index.php';
    }
}
