<?php
namespace controllers\news_in_detail;

use models\news\NewsModel;

class NewsInDetailController {
    public function edit($params){
     
        $news = new NewsModel();
        $news = $news->getNewsById($params['id']);
// tte($news);

        include 'app/views/users_views/news_in_detail/edit.php';
    }
}
