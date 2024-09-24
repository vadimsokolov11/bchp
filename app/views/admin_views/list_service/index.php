<?php

$title = 'Список услуг';
ob_start();
?>

<h1><?= $title ?></h1>
<?php if ($sessionData['user_role'] <= 2) : ?>
    <a href="/admin/list_service/create" class="btn btn-success">Добавить</a>


    <table class="table table-info">
        <thead>
            <tr>
                <th scope="col">Название</th>
                <th scope="col">Изображение</th>
                <th scope="col">Контент</th>
                <th scope="col">Статус</th>
                <th scope="col">Действия</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list_servies as $item) : ?>
                <tr>
                    <td><?php echo $item['title']; ?></td>
                    <td><img src="<?= htmlspecialchars($item['img']); ?>" alt="Изображение" style="width: 200px; height: 150px; object-fit: cover;"></td>
                    <td style="max-width: 300px;"><?php echo $item['content']; ?></td>
                    <td>
                        <?php if ($item['status'] == 1) : ?>
                            <span class="badge bg-success">Активен</span>
                        <?php else : ?>
                            <span class="badge bg-danger">Не активен</span>
                        <?php endif; ?>
                    </td>


                    <td>

                        <a href="/admin/list_service/edit/<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                        <a href="/admin/list_service/delete/<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Вы действительно хотите удалить услугу?')"><i class="bi bi-trash text-danger"></i></a>

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