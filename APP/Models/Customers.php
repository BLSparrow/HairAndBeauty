<?php

namespace APP\Models;

use PDO;

class Customers
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllCustomers()
    {
        $stmt = $this->pdo->query('SELECT customers.*, masters.name as nameMasters FROM customers
                                            INNER JOIN masters ON customers.id_master = masters.id');
        return $stmt->fetchAll();
    }


    public function deleteCustomer($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM customers WHERE id=:id');
        $stmt->execute(['id' => $id]);
    }

    public function getOneCustomer($id)
    {
        $stmt = $this->pdo->prepare('SELECT customers.*, masters.name as nameMasters FROM customers INNER JOIN masters ON customers.id_master = masters.id WHERE customers.id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function addCustomer($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO customers (name, telephone, id_master)
                VALUES (:name, :telephone, :id_master)');
        $stmt->execute([
            'name' => $data['name'],
            'telephone' => $data['telephone'],
            'id_master' => $data['id_master'],
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateCustomer($data)
    {
        $stmt = $this->pdo->prepare('UPDATE customers SET name=:name, telephone=:telephone, id_master=:id_master WHERE id=:id');
        $stmt->execute([
            'id' => $data['id'],
            'name' => $data['name'],
            'telephone' => $data['telephone'],
            'id_master' => $data['id_master'],
        ]);
    }

    public function getCustomersForMasters($id)
    {

        $stmt = $this->pdo->prepare('SELECT customers.*, masters.name as nameMasters FROM customers
                                            INNER JOIN masters ON customers.id_master = masters.id
                                            WHERE masters.id=:id');
        $stmt->execute(['id' => $id]);
        $temp = $stmt->fetchAll();

        return $temp;
    }
}