<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<link rel="stylesheet" href="/css/tableAdmin.css">
<div class="main">
    <table class="table">
        <tbody>
        <?php foreach ($services as $service): ?>
            <tr>
                <td><img style="width: 100px;" src="../img/<?= $service->image ?>" alt="img" class="imgCards">
                </td>
                <td style="padding: 25px"><?= $service->title ?></td>
                <td><a class="subscribe" href="/services/new.php"><i class="fas fa-plus-square"></i></a></td>
                <td>
                    <form action="/services/deleteService.php" method="post">
                        <input type="hidden" name="id" value="<?= $service->id ?>">
                        <button class="subscribe" name="delete"
                                onclick="return confirm('Вы действительно хотите удалить услугу?');">
                            <i class="fas fa-minus-square"></i>
                        </button>
                    </form>
                </td>
                <td><a class="subscribe" href="/services/edit.php?id=<?= $service->id ?>"><i
                                class="fas fa-pen-square"></i></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>