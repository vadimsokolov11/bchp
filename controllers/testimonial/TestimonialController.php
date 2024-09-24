<?php

namespace controllers\testimonial;

use models\comment\CommentModel;

class TestimonialController
{
    public function index()
    {

        $comment = new CommentModel();
        $comment = $comment->getAllCommentUser();

        include 'app/views/users_views/reviews/index.php';
    }
}
