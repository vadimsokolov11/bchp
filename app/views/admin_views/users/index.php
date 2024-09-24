<?php

$title = 'Пользователи';
ob_start();
?>

<h1><?= $title ?></h1>
<?php if ($sessionData['user_role'] <= 1) : ?>
    <a href="/users/create" class="btn btn-success">Добавить</a>


    <table class="table table-info">
        <thead>
            <tr>
                <th scope="col">Фамилия</th>
                <th scope="col">Имя</th>
                <th scope="col">Отчество</th>
                <th scope="col">Email</th>
                <!-- <th scope="col">Email verification</th> -->
                <!-- <th scope="col">Is admin</th> -->
                <th scope="col">Роль</th>
                <!-- <th scope="col">Is active</th> -->
                <!-- <th scope="col">Last login</th> -->

            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?php echo $user['surname']; ?></td>
                    <td><?php echo $user['name']; ?></td>
                    <td><?php echo $user['patronymic']; ?></td>
                    <td><?php echo $user['email']; ?></td>
                    <?php if ($sessionData['user_role'] <= 2) : ?>
                        <!-- <td><?php echo $user['email_verification'] ? 'Yes' : 'No'; ?></td> -->
                        <!-- <td><?php echo $user['is_admin'] ? 'Yes' : 'No'; ?></td> -->
                        <td><?php echo $user['role_name']; ?></td>
                        <!-- <td><?php echo $user['is_active'] ? 'Yes' : 'No'; ?></td> -->
                        <!-- <td><?php echo $user['last_login']; ?></td> -->
                    <?php endif; ?>

                    <td>
                        <?php if ($sessionData['user_role'] <= 2) : ?>
                            <a href="/users/edit/<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                            <a href="/users/delete/<?php echo $user['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Вы действительно хотите удалить пользователя и его настройки?')"><i class="bi bi-trash text-danger"></i></a>
                        <?php endif; ?>
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