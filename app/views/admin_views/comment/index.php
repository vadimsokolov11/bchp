<?php

$title = 'Отзывы';
ob_start();
?>

<h1><?= $title ?></h1>
<?php if ($sessionData['user_role'] <= 2) : ?>
    <a href="/admin/comment/create" class="btn btn-success">Добавить</a>


    <table class="table table-info">
        <thead>
            <tr>
                <th scope="col">ФИО</th>
                <th scope="col">Изображение</th>
                <th scope="col">Содержание</th>
                <th scope="col">Статус</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($comment as $item) : ?>
                <tr>
                    <td><?php echo $item['FIO']; ?></td>
                    <td><?php echo $item['img']; ?></td>
                    <td style="max-width: 300px;"><?php echo $item['text']; ?></td>
                    <td>
                        <?php if ($item['status'] == 1) : ?>
                            <span class="badge bg-success">Активен</span>
                        <?php else : ?>
                            <span class="badge bg-danger">Не активен</span>
                        <?php endif; ?>
                    </td>


                    <td>

                        <a href="/admin/comment/edit/<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                        <a href="/admin/comment/delete/<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Вы действительно хотите удалить комментарий?')"><i class="bi bi-trash text-danger"></i></a>

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