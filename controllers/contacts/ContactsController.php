<?php
namespace controllers\contacts;
use models\contact\ContactModel;
class ContactsController {

    
    public function index() {

        $contact = new ContactModel();
        $contact = $contact->contact();
        include 'app/views/users_views/contacts/index.php';
    }


    public function store(){
        
        if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['content'])){
            $name = trim($_POST['name']);
            $email = trim($_POST['email']);
            $content = trim($_POST['content']);
           
// tte($content);
            if (empty($email)) {
                echo "Role name is required!";
                return;
            }

            $message = new ContactModel();
            $message->createMessage($name, $email, $content);
        }
       
        header("Location: /contacts");
    }

}
