<?php

namespace models\orders;

use models\Database;


class OrdersModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllOrders()
    {

        try {
            $stmt = $this->db->query("SELECT * FROM orders");
            $orders = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $orders[] = $row;
            }
            return $orders;
        } catch (\PDOException $e) {
            return false;
        }
    }

    public function getAllOrdersCount()
    {
        try {
            // Выполняем запрос для получения всех записей из таблицы comment
            $stmt = $this->db->query("SELECT * FROM orders");
            $orders = [];
            while ($row = $stmt->fetch(\PDO::FETCH_ASSOC)) {
                $orders[] = $row;
            }

            // Подсчитываем количество записей
            $count = count($orders);

            // Возвращаем ассоциативный массив с данными и количеством записей
            return [
                'count' => $count,
            ];
        } catch (\PDOException $e) {
            return false;
        }
    }


    public function createOrders($name, $surname, $phone, $e_mail, $address)
    {
        // tte($name);
        $query = "INSERT INTO orders (name, surname, phone, e_mail, address) VALUES (?, ?, ?, ?, ?)";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$name, $surname, $phone, $e_mail, $address]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
    public function getOrdersById($id)
    {
        $query = "SELECT * FROM orders WHERE id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            $orders = $stmt->fetch(\PDO::FETCH_ASSOC);

            return $orders ? $orders : false;
        } catch (\PDOException $e) {
            return false;
        }
    }
    public function updateOrders($id, $name, $surname, $patronymic, $phone, $e_mail, $address, $status)
    {


        $query = "UPDATE orders SET name = ?, surname = ?, patronymic = ?, phone = ?, e_mail = ?, address = ?, status = ? WHERE id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$name, $surname, $patronymic, $phone, $e_mail, $address, $status, $id]);

            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
    public function deleteOrders($id)
    {
        $query = "DELETE FROM orders WHERE id = ?";

        try {
            $stmt = $this->db->prepare($query);
            $stmt->execute([$id]);
            return true;
        } catch (\PDOException $e) {
            return false;
        }
    }
}
