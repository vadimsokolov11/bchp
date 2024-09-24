<?php

namespace controllers\users;

use models\roles\Role;
use models\users\User;
use models\Check;

class UsersController
{

    private $check;

    public function __construct()
    {
        $userRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;
        $this->check = new Check($userRole);
    }

    public function index()
    {
        $this->check->requirePermission();
        $userModel = new User();
        $users = $userModel->readAll();


        $roleModel = new Role();
        $roles = $roleModel->getAllRoles();

        $sessionData = $_SESSION; // выводит данные из сессии (на данный момент username, user_role, user_id, user_email)

        // tte($_SESSION); // отладчик (что выводит любая переменная)
        include 'app/views/admin_views/users/index.php';
    }

    public function create()
    {
        $this->check->requirePermission();
        include 'app/views/admin_views/users/create.php';
    }

    public function store()
    {
        $this->check->requirePermission();
        if (isset($_POST['surname']) && isset($_POST['name']) && isset($_POST['patronymic']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['confirm_password'])) {
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];

            if ($password !== $confirm_password) {
                echo "Passwords do not match";
                return;
            }

            $userModel = new User();
            $data = [
                'surname' => $_POST['surname'],
                'name' => $_POST['name'],
                'patronymic' => $_POST['patronymic'],
                'email' => $_POST['email'],
                'password' => $password,
                'role' => 3,
            ];

            $userModel->create($data);
        }

        header("Location: /users");
    }

    public function edit($params)
    {
        $this->check->requirePermission();
        $userModel = new User();
        $user = $userModel->read($params['id']);

        $roleModel = new Role();
        $roles = $roleModel->getAllRoles();
        // tte( $user);
        include 'app/views/admin_views/users/edit.php';
    }


    public function update($params)
    {
        $this->check->requirePermission();

        $userModel = new User();
        $userModel->update($params['id'], $_POST);
        if (isset($_POST['email'])) {
            $newEmail = $_POST['email'];

            // Проверяем, совпадает ли роль текущего пользователя с обновленной ролью
            if ($newEmail == $_SESSION['user_email']) {

                header("Location: /auth/logout");
                exit();
            }
        }

        header("Location: /users");
    }



    public function delete($params)
    {
        $this->check->requirePermission();
        $userModel = new User();
        $userModel->delete($params['id']);

        header("Location: /users");
    }
}
