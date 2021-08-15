<?php
include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<link rel="stylesheet" href="/css/tableAdmin.css">
<div class="main">
    <table class="table">
        <tbody>
        <?php foreach ($posts as $post): ?>
            <tr>
                <td><img style="width: 100px;" src="../img/<?= $post->image1 ?>" alt="img" class="imgCards">
                </td>
                <td><img style="width: 100px;" src="../img/<?= $post->image2 ?>" alt="img" class="imgCards">
                </td>
                <td style="padding: 25px"><?= $post->title ?></td>
                <td style="padding: 25px"><?= $post->description ?></td>
                <td><a class="subscribe" href="/posts/new.php"><i class="fas fa-plus-square"></i></a></td>
                <td>
                    <form action="/posts/deletePost.php" method="post">
                        <input type="hidden" name="id" value="<?= $post->id ?>">
                        <button class="subscribe" name="delete"
                                onclick="return confirm('Вы действительно хотите удалить пост?');">
                            <i class="fas fa-minus-square"></i>
                        </button>
                    </form>
                </td>
                <td><a class="subscribe" href="/posts/edit.php?id=<?= $post->id ?>"><i
                                class="fas fa-pen-square"></i></a></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>