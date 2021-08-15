<?php

namespace APP\Models;

use PDO;

class Comments
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllComments()
    {
        $stmt = $this->pdo->query('SELECT * FROM comments');
        return $stmt->fetchAll();
    }

    public function getOneComment($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM comments WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }


    public function getAllCommentsV()
    {
        $stmt = $this->pdo->query('SELECT * FROM commentsforverification');
        return $stmt->fetchAll();
    }

    public function getOneCommentV($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM commentsforverification WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }


    public function deleteComment($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM comments WHERE id=:id');
        $stmt->execute(['id' => $id]);
    }
    public function deleteCommentV($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM commentsforverification WHERE id=:id');
        $stmt->execute(['id' => $id]);
    }

    public function addComment($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO commentsforverification (name , text)
                VALUES (:name, :text)');
        $stmt->execute([
            'name' => $data['name'],
            'text' => $data['text'],
        ]);
        return $this->pdo->lastInsertId();
    }

    public function commentsVerification($id)
    {
        $stmt = $this->pdo->prepare('INSERT INTO comments SELECT * FROM commentsforverification WHERE  id=:id;
                                            DELETE FROM commentsforverification WHERE  id=:id LIMIT 1;');
        $stmt->execute(['id' => $id]);
    }

}