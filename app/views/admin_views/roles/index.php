<?php

$title = 'Роли';
ob_start();
?>

<h1 class="mb-4"><?= $title ?></h1>
<?php if ($sessionData['user_role'] <= 1) : ?>
    <a href="/roles/create" class="btn btn-success">Добавить</a>
    <table class="table table-info">
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th>Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($roles as $role) : ?>
                <tr>
                    <td><?= $role['role_name'] ?></td>
                    <td><?= $role['role_description'] ?></td>
                    <td>
                        <a href="/roles/edit/<?= $role['id'] ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                        <form method="POST" action="/roles/delete/<?= $role['id'] ?>" class="d-inline-block">
                            <!-- <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button> -->
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p class="text-danger">У вас нет прав доступа, обратитесь к администратору.</p>
<?php endif; ?>


<?php $content = ob_get_clean();

include 'app/views/layout/layout.php';
?>