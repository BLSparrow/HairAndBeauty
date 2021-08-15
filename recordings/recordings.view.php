<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>

<link rel="stylesheet" href="/css/tableAdmin.css">
<div class="main">

    <div class="sorting">
        <form action="#" method="get" enctype="multipart/form-data">
            <div class="sort">
                <label style="color: #000" class="text" for="id_master">Сортировать по мастерам</label><br>
                <select class="t2" name="filterMaster_id" id="id_master">
                    <option value="" disabled selected>Выберите мастера</option>
                    <?php foreach ($masters as $master): ?>
                        <option value="<?= $master->id ?>"><?= $master->name ?></option>
                    <?php endforeach; ?>
                </select>
                <button class="subscribe" name="searchButton">Поиск</button>
            </div>
        </form>

    </div>
    <br>

    <table class="table">
        <thead>
        <tr>
            <th>Мастер</th>
            <th>Клиент</th>
            <th>Номер клиента</th>
            <th>Время</th>
            <th>Дата</th>
            <th>Услуга</th>
            <th>Цена</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($recordings as $recording): ?>
            <tr>
                <td style="padding: 25px"><?= $recording->nameMasters ?></td>
                <td style="padding: 25px"><?= $recording->nameCustomers ?></td>
                <td style="padding: 25px"><?= $recording->telephone ?></td>
                <td style="padding: 25px"><?= $recording->time ?></td>
                <td style="padding: 25px"><?= $recording->date_reg ?></td>
                <td style="padding: 25px"><?= $recording->title ?></td>
                <td style="padding: 25px"><?= $recording->price ?></td>
                <td>
                    <form action="/recordings/deleteRecording.php" method="post">
                        <input type="hidden" name="id" value="<?= $recording->id ?>">
                        <button class="subscribe" name="delete"
                                onclick="return confirm('Вы действительно хотите удалить запись?');">
                            <i class="fas fa-user-minus"></i>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>