<?php

namespace controllers\posts;

use models\posts\PostsModel;

class PostsController
{
    public function index()
    {

        $news = new PostsModel();
        $news = $news->getAllNewsUser();
        include 'app/views/users_views/posts/index.php';
    }
}
