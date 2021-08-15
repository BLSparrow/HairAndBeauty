<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<link rel="stylesheet" href="/css/tableAdmin.css">
<div class="main">
    <h2>Не проверено!</h2>
    <table class="table">
        <tbody>
        <?php foreach ($commentsV as $comment): ?>
            <tr>
                <td style="padding: 25px"><?= $comment->name ?></td>
                <td style="padding: 25px"><?= $comment->text ?></td>
                <td>
                    <form action="/comments/deleteCom.php" method="post">
                        <input type="hidden" name="id" value="<?= $comment->id ?>">
                        <button class="subscribe" name="delete"
                                onclick="return confirm('Вы действительно хотите удалить комментарий?');">
                            <i class="fas fa-minus-square"></i>
                        </button>
                    </form>
                </td>
                <td>
                    <form action="/comments/verification.php" method="post">
                        <input type="hidden" name="id" value="<?= $comment->id ?>">
                        <button class="subscribe" name="verification"
                                onclick="return confirm('Вы действительно хотите опубликовать комментарий?');">
                            <i class="fas fa-comment-medical"></i>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>


    <h2>Проверено!</h2>
    <table class="table">
        <tbody>
        <?php foreach ($comments as $comment): ?>
            <tr>
                <td style="padding: 25px"><?= $comment->name ?></td>
                <td style="padding: 25px"><?= $comment->text ?></td>
                <td>
                    <form action="/comments/deleteCom.php" method="post">
                        <input type="hidden" name="id" value="<?= $comment->id ?>">
                        <button class="subscribe" name="delete"
                                onclick="return confirm('Вы действительно хотите удалить комментарий?');">
                            <i class="fas fa-minus-square"></i>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>