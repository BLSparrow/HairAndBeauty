<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<div class="mainCom">
    <table border="1">
        <?php if ($post): ?>
            <tr>
                <td><img style="width: 100px;" src="../img/<?= $post->image1 ?>" alt="img" class="imgCards">
                </td>
                <td><img style="width: 100px;" src="../img/<?= $post->image2 ?>" alt="img" class="imgCards">
                </td>
                <td style="padding: 25px"><?= $post->title ?></td>
                <td style="padding: 25px"><?= $post->description ?></td>
                <td>
                    <form action="/posts/deleteHair.php" method="post">
                        <input type="hidden" name="id" value="<?= $post->id ?>">
                        <button class="subscribe" name="delete" type="submit"
                                onclick="return confirm('Вы действительно хотите удалить пост?');">
                            Удалить
                        </button>
                    </form>
                </td>
            </tr>
        <?php else: ?>
            <div>Запрашиваемый ресурс не гайден...</div>
        <?php endif; ?><br>
    </table>