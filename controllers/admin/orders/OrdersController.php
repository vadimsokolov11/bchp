<?php

namespace controllers\admin\orders;

use models\orders\OrdersModel;



class OrdersController
{
    public function index()
    {

        $orders = new OrdersModel();
        $orders = $orders->getAllOrders();
        $sessionData = $_SESSION; // выводит данные из сессии (на данный момент username, user_role, user_id, user_email)

        // tte($orders);
        include 'app/views/admin_views/orders/index.php';
    }



    public function store()
    {

        if (isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['phone']) && isset($_POST['e_mail']) && isset($_POST['address'])) {
            $name = trim($_POST['name']);
            $surname = trim($_POST['surname']);
            $phone = trim($_POST['phone']);
            $e_mail = trim($_POST['e_mail']);
            $address = trim($_POST['address']);


            if (empty($surname)) {
                echo "Role name is required!";
                return;
            }

            $orders = new OrdersModel();
            $orders->createOrders($name, $surname, $phone, $e_mail, $address);
        }

        header("Location: /home");
    }

    public function edit($params)
    {

        $orders = new OrdersModel();
        $orders = $orders->getOrdersById($params['id']);

        if (!$orders) {
            echo "Role not found";
            return;
        }

        include 'app/views/admin_views/orders/edit.php';
    }

    public function update($params)
    {


        if (
            isset($params['id']) && isset($_POST['name']) && isset($_POST['surname']) && isset($_POST['patronymic'])
            && isset($_POST['phone']) && isset($_POST['e_mail']) && isset($_POST['address'])  && isset($_POST['status'])
        ) {
            $id = trim($params['id']);
            $name = trim($_POST['name']);
            $surname = trim($_POST['surname']);
            $patronymic = trim($_POST['patronymic']);
            $phone = trim($_POST['phone']);
            $e_mail = trim($_POST['e_mail']);
            $address = trim($_POST['address']);
            $status = trim($_POST['status']);


            if (empty($status)) {
                echo "Role name is required";
                return;
            }
            $oq = new OrdersModel();
            $oq->updateOrders($id, $name, $surname, $patronymic, $phone, $e_mail, $address, $status);
        }

        header("Location: /admin/orders");
    }
    public function delete($params)
    {

        $news = new OrdersModel();
        $news->deleteOrders($params['id']);

        header("Location: /admin/orders");
    }
}
