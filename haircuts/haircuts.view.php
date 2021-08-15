<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<link rel="stylesheet" href="/css/tableAdmin.css">
<div class="main">
    <table class="table">
        <tbody>
        <?php foreach ($haircuts as $hair): ?>
            <tr>
                <td><img style="width: 100px;" src="../img/<?= $hair->image ?>" alt="img" class="imgCards">
                </td>
                <td style="padding: 25px"><?= $hair->title ?></td>
                <td style="padding: 25px"><?= $hair->price ?></td>
                <td><a class="subscribe" href="/haircuts/new.php"><i class="fas fa-plus-square"></i></a></td>
                <td>
                    <form action="/haircuts/deleteHair.php" method="post">
                        <input type="hidden" name="id" value="<?= $hair->id ?>">
                        <button class="subscribe" name="delete"
                                onclick="return confirm('Вы действительно хотите удалить услугу?');">
                            <i class="fas fa-minus-square"></i>
                        </button>
                    </form>
                </td>
                <td><a class="subscribe" href="/haircuts/edit.php?id=<?= $hair->id ?>"><i class="fas fa-pen-square"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>