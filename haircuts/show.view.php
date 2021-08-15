<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<div class="mainCom">
    <table border="1">
        <?php if ($hair): ?>
            <tr>
                <td><img style="width: 100px;" src="../img/<?= $hair->image ?>" alt="img" class="imgCards">
                </td>
                <td style="padding: 25px"><?= $hair->title ?></td>
                <td style="padding: 25px"><?= $hair->price ?></td>
                <td>
                    <form action="/haircuts/deleteHair.php" method="post">
                        <input type="hidden" name="id" value="<?= $hair->id ?>">
                        <button class="subscribe" name="delete" type="submit"
                                onclick="return confirm('Вы действительно хотите удалить услугу?');">
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
        <?php else: ?>
            <div>Запрашиваемый ресурс не гайден...</div>
        <?php endif; ?><br>
    </table>