<?php
namespace controllers\about;

use models\comment\CommentModel;
class AboutController {
    public function index() {

        $comment = new CommentModel();
        $comment = $comment->getAllComment();

        include 'app/views/users_views/about/index.php';
    }
}
