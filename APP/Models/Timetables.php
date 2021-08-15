<?php

namespace APP\Models;

use PDO;

class Timetables
{
    protected $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllTimetables()
    {
        $stmt = $this->pdo->query('SELECT timetables.*, masters.id as idMasters, masters.name as nameMasters, masters.image as imgMasters, times.time
                                            FROM timetables INNER JOIN masters ON timetables.master_id = masters.id
                                            INNER JOIN times ON timetables.time_id = times.id');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllTimes()
    {
        $stmt = $this->pdo->query('SELECT * FROM times');
        return $stmt->fetchAll();
    }


    public function deleteTimetables($id)
    {
        $stmt = $this->pdo->prepare('DELETE FROM timetables WHERE id=:id');
        $stmt->execute(['id' => $id]);
    }

    public function getOneTimetable($id)
    {
        $stmt = $this->pdo->prepare('SELECT * FROM timetables WHERE id=:id');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function addTimetable($data)
    {
        $stmt = $this->pdo->prepare('INSERT INTO timetables (master_id, date, time_id)
                VALUES (:master_id, :date, :time_id)');
        $stmt->execute([
            'master_id' => $data['master_id'],
            'date' => $data['date'],
            'time_id' => $data['time_id'],
        ]);
        return $this->pdo->lastInsertId();
    }

    public function updateTimetables($data)
    {
        $stmt = $this->pdo->prepare('UPDATE timetables SET master_id=:master_id; date=:date; time_id=:time_id WHERE id=:id');
        $stmt->execute([
            'id' => $data['id'],
            'master_id' => $data['master_id'],
            'date' => $data['date'],
            'time_id' => $data['time_id'],
        ]);
    }

    public function getWorkTime($arr)
    {
        $stmt = $this->pdo->query('SELECT * FROM times 
                                            WHERE id in (' . $arr . ')');
        $stmt->execute(['id' => $arr]);
        return $stmt->fetchAll();
    }

}