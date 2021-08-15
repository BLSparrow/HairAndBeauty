<?php


namespace APP\Models;

use PDO;

class Auth
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function auth($login, $password)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users 
                    WHERE login = :login');
        $stmt->execute([
            'login' => $login,
        ]);

        $user = $stmt->fetch();

        if ($user) {
            if (password_verify($password, $user->password)) {
                return $user;
            }
        }
        return false;
    }

    public function register($id, $login, $password, $role)
    {
        if ($this->auth($login, $password)) {
            return -1;
        }
        $stmt = $this->pdo->prepare('INSERT INTO users (id, login, password, role) 
            VALUES (:id, :login, :password, :role)');
        $stmt->execute([
            'id' => $id,
            'login' => $login,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => $role,
        ]);
        return $this->pdo->lastInsertId();

    }

    public function getAllUsers()
    {
        $stmt = $this->pdo->query('SELECT * FROM users ORDER BY id ');
        return $stmt->fetchAll();
    }

    public function deleteUser($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM users WHERE id=:id');
        $stmt->execute(['id' => $id]);
    }

    public function getOneUser($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function find($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM users WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }
}