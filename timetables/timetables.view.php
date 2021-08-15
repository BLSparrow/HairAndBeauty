<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<link rel="stylesheet" href="/css/tableAdmin.css">
<div class="main">
    <table class="table">
        <?php function array_group_by($data, $key)
        {
            $result = [];
            foreach ($data as $item) {
                $result[$item[$key]][] = $item;
            }
            return $result;
        }

        $group_key = 'idMasters';

        $data = array_group_by($timesTable, $group_key);

        foreach ($data as $key => $list):?>
            <tr>
                <th><?= $list[0]['nameMasters'] ?></th>
                <th>Дата и время</th>
            </tr>
            <tr>
                <td><img style="width: 50px;" src="/img/<?= $list[0]['imgMasters'] ?>" alt="img"></td>
                <?php foreach ($list as $line): ?>
                    <td>
                        <details>
                            <summary><?= date("d.m.Y", strtotime($line['date'])); ?></summary>
                            <?php
                            $arr = $line['time_id'];
                            $row = $dataTimetables->getWorkTime($arr);
                            foreach ($row as $r):?>
                                <p><?= substr($r->time, 0, -3); ?></p>
                            <?php endforeach; ?>
                        </details>
                    </td>
                    <td><a class="subscribe" href="/timetables/new.php"><i class="fas fa-plus-square"></i></a></td>
                    <td>
                        <form action="/timetables/deleteTimetables.php" method="post">
                            <input type="hidden" name="id" value="<?= $line['id'] ?>">
                            <button class="subscribe" name="delete"
                                    onclick="return confirm('Вы действительно хотите удалить это рассписание?');">
                                <i class="fas fa-minus-square"></i>
                            </button>
                        </form>
                    </td>
                    </td>
                <?php endforeach; ?>
            </tr>
        <?php endforeach; ?>
    </table>
</div>