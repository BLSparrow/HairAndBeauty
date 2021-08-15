<?php

namespace APP\Models;

use PDO;

class Haircuts
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllHaircuts()
    {
        $stmt = $this->pdo->query('SELECT haircuts.*, services.title as titleService, services.id as servicesID FROM haircuts 
                            inner join services on haircuts.service_id = services.id');
        return $stmt->fetchAll();
    }


    public function deleteHair($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM haircuts WHERE id=:id');
        $stmt->execute(['id' => $id]);
    }

    public function getOneHair($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM haircuts WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function addHair($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO haircuts (title, price, image, service_id)
                VALUES (:title, :price, :image, :service_id)');
        $stmt->execute([
            'title' => $data['title'],
            'price' => $data['price'],
            'image' => $data['image'],
            'service_id' => $data['service_id'],
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateHair($data)
    {
        $stmt = $this->pdo->prepare('UPDATE haircuts SET title=:title, price=:price, image=:image, service_id=:service_id WHERE id=:id');
        $stmt->execute([
            'id' => $data['id'],
            'title' => $data['title'],
            'price' => $data['price'],
            'image' => $data['image'],
            'service_id' => $data['service_id'],
        ]);
    }

    public function getHaircutsForService($id)
    {

        $stmt = $this->pdo->prepare('SELECT haircuts.*, services.title as titleService FROM haircuts 
                            inner join services on haircuts.service_id = services.id 
                            WHERE services.id=:id');
        $stmt->execute(['id' => $id]);
        $temp = $stmt->fetchAll();

        return $temp;
    }

    public function getAllHaircutsWithService()
    {
        $stmt = $this->pdo->query('SELECT haircuts.*, services.title as titleService FROM haircuts 
                            inner join services on haircuts.service_id = services.id');
        return $stmt->fetchAll();
    }

}