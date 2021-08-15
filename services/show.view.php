<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<div class="mainCom">
    <table border="1">
        <?php if ($service): ?>
            <tr>
                <td><img style="width: 100px;" src="../img/<?= $service->image ?>" alt="img" class="imgCards">
                </td>
                <td style="padding: 25px"><?= $service->title ?></td>
                <td>
                    <form action="/services/deleteService.php" method="post">
                        <input type="hidden" name="id" value="<?= $service->id ?>">
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