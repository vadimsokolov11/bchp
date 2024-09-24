<?php

$title = 'События';
ob_start();
?>

<h1 class="mb-4"><?= $title ?></h1>
<form method="POST" action="/admin/events/add" class="blue-background">
    <input type="hidden" name="event" value="<?php echo htmlspecialchars($event_id); ?>">
    <div class="mb-3">
        <label for="album_name" class="form-label">Название</label>
        <input type="text" class="form-control" id="album_name" name="album_name" required>
    </div>
    <div class="mb-3">
        <label for="album_description" class="form-label">Описание</label>
        <input type="text" class="form-control" id="album_description" name="album_description" required>
    </div>

    <button type="submit" class="btn btn-primary">Добавить</button>
</form>

<table class="table table-info">
    <thead>
        <tr>
            <th scope="col">Название События</th>
            <th scope="col">Описание События</th>

            <th scope="col">Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($events as $item) : ?>
            <tr>
                <td><?php echo $item['album_name']; ?></td>
                <td><?php echo $item['album_description']; ?></td>

                <td>
                    <form action="/admin/posts/create/<?php echo $item['id']; ?>" method="post">
                        <input type="hidden" name="event" value="<?php echo htmlspecialchars($event_id); ?>">
                        <button type="submit" class="btn btn-sm btn-outline-primary">Добавить фото</button>
                    </form>
                    <a href="/admin/service/delete/<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Вы действительно хотите удалить услугу?')"><i class="bi bi-trash text-danger"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<?php $content = ob_get_clean();

include 'app/views/layout/layout.php';
?>