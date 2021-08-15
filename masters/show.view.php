<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<div class="mainCom">
    <table border="1">
        <?php if ($master): ?>
            <tr>
                <td><img style="width: 100px;" src="../img/<?= $master->image ?>" alt="img" class="imgCards">
                </td>
                <td style="padding: 25px"><?= $master->name ?></td>
                <td style="padding: 25px"><?= $master->about_me ?></td>
                <td style="padding: 25px"><?= $master->telephone ?></td>
                <td style="padding: 25px"><?= $master->email ?></td>
                <td>
                    <form action="/masters/deleteMaster.php" method="post">
                        <input type="hidden" name="id" value="<?= $master->id ?>">
                        <button class="subscribe" name="delete" type="submit"
                                onclick="return confirm('Вы действительно хотите удалить мастера?');">
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
        <?php else: ?>
            <div>Запрашиваемый ресурс не гайден...</div>
        <?php endif; ?><br>
    </table>