<?php

namespace APP\Models;

use PDO;

class Services
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllServices()
    {
        $stmt = $this->pdo->query('SELECT * FROM services');
        return $stmt->fetchAll();
    }


    public function deleteService($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM services WHERE id=:id');
        $stmt->execute(['id' => $id]);
    }

    public function getOneService($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM services WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function addService($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO services (title, image)
                VALUES (:title, :image)');
        $stmt->execute([
            'title' => $data['title'],
            'image' => $data['image'],
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateService($data)
    {
        $stmt = $this->pdo->prepare('UPDATE services SET title=:title, image=:image WHERE id=:id');
        $stmt->execute([
            'id' => $data['id'],
            'title' => $data['title'],
            'image' => $data['image'],
        ]);
    }

}