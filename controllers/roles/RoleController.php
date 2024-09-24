<?php

namespace controllers\roles;

use models\roles\Role;
use models\Check;

class RoleController
{

    private $check;

    public function __construct()
    {
        $userRole = isset($_SESSION['user_role']) ? $_SESSION['user_role'] : null;
        $this->check = new Check($userRole);
    }

    public function index()
    {


        $roleModel = new Role();
        $roles = $roleModel->getAllRoles();
        $sessionData = $_SESSION;
        include 'app/views/admin_views/roles/index.php';
    }

    public function create()
    {

        include 'app/views/admin_views/roles/create.php';
    }

    public function store()
    {


        if (isset($_POST['role_name']) && isset($_POST['role_description'])) {
            $role_name = trim($_POST['role_name']);
            $role_description = trim($_POST['role_description']);

            if (empty($role_name)) {
                echo "Role name is required!";
                return;
            }

            $roleModel = new Role();
            $roleModel->createRole($role_name, $role_description);
        }

        header("Location: /roles");
    }

    public function edit($params)
    {

        $roleModel = new Role();
        $role = $roleModel->getRoleById($params['id']);

        if (!$role) {
            echo "Role not found";
            return;
        }

        include 'app/views/admin_views/roles/edit.php';
    }


    public function update($params)
    {


        if (isset($params['id']) && isset($_POST['role_name']) && isset($_POST['role_description'])) {
            $id = trim($params['id']);
            $role_name = trim($_POST['role_name']);
            $role_description = trim($_POST['role_description']);

            if (empty($role_name)) {
                echo "Role name is required";
                return;
            }

            $roleModel = new Role();
            $roleModel->updateRole($id, $role_name, $role_description);
        }

        header("Location: /roles");
    }

    public function delete($params)
    {

        $roleModel = new Role();
        $roleModel->deleteRole($params['id']);


        header("Location: /roles");
    }
}
