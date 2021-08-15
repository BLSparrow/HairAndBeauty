<?php

namespace APP\Models;

use PDO;

class Recordings
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllRecordings()
    {
        $stmt = $this->pdo->query('SELECT recordings.*, times.time, masters.name as nameMasters, haircuts.title as title, haircuts.price as price, customers.name as nameCustomers, customers.telephone as telephone
        FROM recordings INNER JOIN masters ON recordings.id_master = masters.id
                             INNER JOIN haircuts ON recordings.id_hair = haircuts.id
                                INNER JOIN times ON recordings.id_time = times.id
                             INNER JOIN customers ON recordings.id_customer = customers.id');
        return $stmt->fetchAll();
    }

    public function getOneRecording($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM recordings WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function getRecordingDate($id_time, $date_reg,$master_id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM recordings WHERE id_time='$id_time' AND date_reg='$date_reg' AND id_master='$master_id'");
        $stmt->execute(['id_time' => $id_time,
            'date_reg' => $date_reg,
            'id_master' => $master_id,]);
        return $stmt->fetchColumn();
    }


    public function deleteRecording($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM recordings WHERE id=:id');
        $stmt->execute(['id' => $id]);
    }

    public function addRecording($id_customer, $data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO recordings (id_master, id_hair, id_customer, id_time, date_reg)
                VALUES (:id_master, :id_hair, :id_customer, :id_time, :date_reg)');
        $stmt->execute([
            'id_master' => $data['id_master'],
            'id_hair' => $data['id_hair'],
            'id_customer' => $id_customer,
            'id_time' => $data['id_time'],
            'date_reg' => $data['date_reg'],
        ]);
        return $this->pdo->lastInsertId();
    }

    public function getRecordingsForMasters($id)
    {

        $stmt = $this->pdo->prepare('SELECT recordings.*, masters.name as nameMasters, haircuts.title as title, haircuts.price as price, customers.name as nameCustomers, customers.telephone as telephone
        FROM recordings INNER JOIN masters ON recordings.id_master = masters.id
                             INNER JOIN haircuts ON recordings.id_hair = haircuts.id
                             INNER JOIN customers ON recordings.id_customer = customers.id
                                            WHERE masters.id=:id');
        $stmt->execute(['id' => $id]);
        $temp = $stmt->fetchAll();

        return $temp;
    }

    public function getLastRecording()
    {
        $stmt = $this->pdo->query('SELECT recordings.*,times.time, masters.name as nameMasters, masters.telephone as tel, haircuts.title as title, haircuts.price as price, customers.name as nameCustomers, customers.telephone as telephone
        FROM recordings INNER JOIN masters ON recordings.id_master = masters.id
                             INNER JOIN haircuts ON recordings.id_hair = haircuts.id
                             INNER JOIN customers ON recordings.id_customer = customers.id
                            INNER JOIN times ON recordings.id_time = times.id
                             ORDER BY recordings.id DESC LIMIT 1');
        return $stmt->fetchAll();
    }

}