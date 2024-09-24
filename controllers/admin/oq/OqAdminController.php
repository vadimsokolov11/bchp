<?php
namespace controllers\admin\oq;

use models\oq\OqModel;

class OqAdminController {
    public function index() {

        $oq = new OqModel();
        $oq = $oq->getAllOq();

        $sessionData = $_SESSION; // выводит данные из сессии (на данный момент username, user_role, user_id, user_email)
        include 'app/views/admin_views/oq/index.php';
    }

   
    public function create(){
      
        include 'app/views/admin_views/oq/create.php';
    }

    public function store(){
        
        if(isset($_POST['title']) && isset($_POST['content']) && isset($_POST['status'])){
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);
            $status = trim($_POST['status']);

            if (empty($content)) {
                echo "Role name is required!";
                return;
            }

            $oq = new OqModel();
            $oq->createOq($title, $content, $status);
        }
       
        header("Location: /admin/oq");
    }

    public function edit($params){
     
        $oq = new OqModel();
        $oq = $oq->getOqById($params['id']);

        if(!$oq){
            echo "Role not found";
            return;
        }

        include 'app/views/admin_views/oq/edit.php';
    }

    public function update($params){
       

        if(isset($params['id']) && isset($_POST['title']) && isset($_POST['content']) && isset($_POST['status'])){
            $id = trim($params['id']);
            $title = trim($_POST['title']);
            $content = trim($_POST['content']);
            $status = trim($_POST['status']);


            if (empty($title)) {
                echo "Role name is required";
                return;
            }
            $oq = new OqModel();
            $oq->updateOq($id, $title, $content, $status);
        }
        
        header("Location: /admin/oq");
    }

    public function delete($params){
       
        $oq = new OqModel();
        $oq->deleteOq($params['id']);
       
        header("Location: /admin/oq");
    }

    
}
