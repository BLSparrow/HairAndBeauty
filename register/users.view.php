<?php include $_SERVER['DOCUMENT_ROOT'] . '/templates/navbar.admin.php'; ?>
<link rel="stylesheet" href="/css/tableAdmin.css">
<table class="table">
    <thead>
    <tr>
        <th>Login</th>
        <th>Role</th>
        <th>Удалить</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
         <tr>
                <td><?= $user->login ?></td>
                <td><?= $user->role ?></td>
                <?php if ($user->role != "Admin"): ?>
                 <td>
                     <form action="/register/deleteUser.php" method="post">
                            <input type="hidden" name="id" value="<?= $user->id ?>">
                         <button class="subscribe" name="delete"
                                onclick="return confirm('Вы действительно хотите удалить менеджера?');">
                            <i class="fas fa-user-minus"></i>
                        </button>
                        </form>
                    </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
