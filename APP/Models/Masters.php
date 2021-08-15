<?php

namespace APP\Models;

use PDO;

class Masters
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllMasters()
    {
        $stmt = $this->pdo->query('SELECT * FROM masters');
        return $stmt->fetchAll();
    }


    public function deleteMaster($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM masters WHERE id=:id');
        $stmt->execute(['id' => $id]);
    }

    public function getOneMaster($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM masters WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function addMaster($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO masters (name, image, about_me, telephone, email)
                VALUES (:name, :image, :about_me, :telephone, :email)');
        $stmt->execute([
            'name' => $data['name'],
            'image' => $data['image'],
            'about_me' => $data['about_me'],
            'telephone' => $data['telephone'],
            'email' => $data['email'],
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateMaster($data)
    {
        $stmt = $this->pdo->prepare('UPDATE masters SET name=:name, image=:image, about_me=:about_me, telephone=:telephone, email=:email WHERE id=:id');
        $stmt->execute([
            'id' => $data['id'],
            'name' => $data['name'],
            'image' => $data['image'],
            'about_me' => $data['about_me'],
            'telephone' => $data['telephone'],
            'email' => $data['email'],
        ]);
    }
}