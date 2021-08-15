<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<link rel="stylesheet" href="/css/tableAdmin.css">
<div class="main">
    <table class="table">
        <tbody>
        <?php foreach ($masters as $master): ?>
            <tr>
                <td><img style="width: 100px;" src="../img/<?= $master->image ?>" alt="img" class="imgCards">
                </td>
                <td style="padding: 25px"><?= $master->name ?></td>
                <td style="padding: 25px"><?= $master->about_me ?></td>
                <td style="padding: 25px"><?= $master->telephone ?></td>
                <td style="padding: 25px"><?= $master->email?></td>
                <td><a class="subscribe" href="/masters/new.php"><i class="fas fa-user-plus"></i></a></td>
                <td>
                    <form action="/masters/deleteMaster.php" method="post">
                        <input type="hidden" name="id" value="<?= $master->id ?>">
                        <button class="subscribe" name="delete"
                                onclick="return confirm('Вы действительно хотите удалить мастера?');">
                            <i class="fas fa-user-minus"></i>
                        </button>
                    </form>
                </td>
                <td><a class="subscribe" href="/masters/edit.php?id=<?= $master->id ?>"><i class="fas fa-user-edit"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>