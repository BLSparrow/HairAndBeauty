<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<link rel="stylesheet" href="/css/tableAdmin.css">
<div class="main">

    <form action="#" method="get" enctype="multipart/form-data">
        <div class="sort">
            <label style="color: #000" class="text" for="id_master">Сортировка по мастерам</label><br>
            <select class="t2" name="filterMaster_id" id="id_master">
                <option value="" disabled selected>Выберите мастера</option>
                <?php foreach ($masters as $master): ?>
                    <option value="<?= $master->id ?>"><?= $master->name ?></option>
                <?php endforeach; ?>
            </select>
            <button class="subscribe" name="searchButton">Поиск</button>
        </div>
    </form>
    <br>

    <p class="<?= $_SESSION['alert'] ?? '' ?>"><?= $_SESSION['msg'] ?? '' ?></p>
    <table class="table">
        <thead>
        <tr>
            <th>Клиент</th>
            <th>Номер клиента</th>
            <th>Мастер</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($customers as $customer): ?>
            <tr>
                <td style="display: none"><?= $customer->id_master ?></td>
                <td style="padding: 25px"><?= $customer->name ?></td>
                <td style="padding: 25px"><?= $customer->telephone ?></td>
                <td style="padding: 25px"><?= $customer->nameMasters ?></td>
                <td>
                    <form action="/customers/deleteCustomers.php" method="post">
                        <input type="hidden" name="id" value="<?= $customer->id ?>">
                        <button class="subscribe" name="delete"
                                onclick="return confirm('Вы действительно хотите удалить клиента?');">
                            <i class="fas fa-user-minus"></i>
                        </button>
                    </form>
                </td>
                <td><a class="subscribe" href="/customers/edit.php?id=<?= $customer->id ?>"><i
                                class="fas fa-user-edit"></i></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>