<?php
namespace controllers\auth;

use models\AuthUser;

class AuthController{

    public function register(){
        include 'app/views/admin_views/auth/register.php';
    }

    public function store(){


        if(isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])){
          
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $confirm_password = trim($_POST['confirm_password']);
    
            if (empty($email) || empty($password) || empty($confirm_password)) {
                echo "All fields are required";
                return;
            }
    
            if ($password !== $confirm_password) {
                echo "Passwords do not match";
                return;
            }
            
            $userModel = new AuthUser();
            $userModel->register($email, $password);
        }
        header("Location:  /auth/login");
    }
    

    public function login(){
        include 'app/views/admin_views/auth/login.php';
    }

    public function authenticate(){
        $authModel = new AuthUser();
    
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = trim($_POST['email']);
            $password = trim($_POST['password']);
            $remember = isset($_POST['remember']) ? $_POST['remember'] : '';
    
            $user = $authModel->findByEmail($email);
            
            if($user && password_verify($password, $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_role'] = $user['role_id'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['name'] = $user['name'];
                $_SESSION['patronymic'] = $user['patronymic'];
                $_SESSION['surname'] = $user['surname'];
                $_SESSION['avatar'] = $user['path_avatar'];
    
                if($remember == 'on'){
                    setcookie('user_email', $email, time() + (7 * 24 * 60 * 60), '/');
                    setcookie('user_password', $password, time() + (7 * 24 * 60 * 60), '/');
                }

                header("Location: /admin/events");
            } else {
                echo "Неверный логин или пароль";
            }
        }
    }
    
    

    public function logout(){
        // session_start();
        session_unset();
        session_destroy();
       
        header("Location: /auth/login");
    }

}