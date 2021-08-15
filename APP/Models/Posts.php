<?php

namespace APP\Models;

use PDO;

class Posts
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllPosts()
    {
        $stmt = $this->pdo->query('SELECT p.id, p.title, p.image1, p.image2, p.description, p.count_like,
                                            (select count(*) from commentsforposts where post_id = p.id) as comments_count
                                              FROM posts as p');
        return $stmt->fetchAll();
    }


    public function deletePost($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM posts WHERE id=:id');
        $stmt->execute(['id' => $id]);
    }

    public function getOnePost($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM posts WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function addPost($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO posts (title, image1, image2, description, count_like)
                VALUES (:title, :image1, :image2, :description, :count_like)');
        $stmt->execute([
            'title' => $data['title'],
            'image1' => $data['image1'],
            'image2' => $data['image2'],
            'description' => $data['description'],
            'count_like'=> $data['count_like']
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updatePost($data)
    {
        $stmt = $this->pdo->prepare('UPDATE posts SET title=:title, image1=:image1, image2=:image2, description=:description WHERE id=:id');
        $stmt->execute([
            'id' => $data['id'],
            'title' => $data['title'],
            'image1' => $data['image1'],
            'image2' => $data['image2'],
            'description' => $data['description'],
        ]);
    }

//    -------------------------------------------------------------------------
    public function getAllCommentsPost()
    {
        $stmt = $this->pdo->query('SELECT * FROM commentsforposts');
        return $stmt->fetchAll();
    }

    public function getAllCommentsPostId($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM commentsforposts where post_id=:post_id');
        $stmt->execute(['post_id' => $id]);
        return $stmt->fetchAll();
    }

    public function getOneCommentPost($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM commentsforposts WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getAllCommentsPostV()
    {
        $stmt = $this->pdo->query('SELECT * FROM commentsforpostverification');
        return $stmt->fetchAll();
    }

    public function getOneCommentPostV($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM commentsforpostverification WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function addCommentPost($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO commentsforpostverification (name , text, post_id)
                VALUES (:name, :text, :post_id)');
        $stmt->execute([
            'name' => $data['name'],
            'text' => $data['text'],
            'post_id' => $data['post_id'],
        ]);
        return $this->pdo->lastInsertId();
    }

    public function commentsPostVerification($id)
    {
        $stmt = $this->pdo->prepare('INSERT INTO commentsforposts SELECT * FROM commentsforpostverification WHERE  id=:id;
                                            DELETE FROM commentsforpostverification WHERE  id=:id LIMIT 1;');
        $stmt->execute(['id' => $id]);
    }

    public function deleteCommentPost($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM commentsforposts WHERE id=:id');
        $stmt->execute(['id' => $id]);
    }

    public function deleteCommentPostV($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM commentsforpostverification WHERE id=:id');
        $stmt->execute(['id' => $id]);
    }

//    ---------------------------------------------------------------------
    public function updateLike($id)
    {
        $stmt = $this->pdo->prepare("UPDATE posts SET count_like = count_like+1  WHERE id = :id");
        $stmt->execute(array('id' => $id,));
    }

    public function getLikeForPost($id)
    {
        $stmt = $this->pdo->prepare("SELECT count_like FROM posts WHERE id = :id");
        $stmt->execute(array(':id' => $id));
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function deleteDateIp($day)
    {
        $stmt = $this->pdo->prepare("DELETE FROM ip_users WHERE date_resp < '$day'");
        $stmt->execute(['day' => $day]);
    }

    public function inspectionIP($id, $ip)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM ip_users WHERE post_id='$id' AND ip='$ip'");
        $stmt->execute(['post_id' => $id,
            'ip' => $ip]);
        return $stmt->fetchColumn();
    }

    public function addUserIP($data)
    {
        $stmt = $this->pdo->prepare("INSERT INTO ip_users (post_id, ip, date_resp) VALUES (:post_id, :ip, :date_resp)");
        $stmt->execute([
            'post_id' => $data['post_id'],
            'ip' => $data['ip'],
            'date_resp' => $data['date_resp'],
            ]);
    }
}