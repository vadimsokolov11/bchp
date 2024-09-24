<?php

$title = 'Ответы на вопросы';
ob_start();
?>

<h1><?= $title ?></h1>
<?php if ($sessionData['user_role'] <= 2) : ?>
    <a href="/admin/oq/create" class="btn btn-success">Добавить</a>

    <?php
    function truncateText($text, $maxLength = 600)
    {
        if (strlen($text) > $maxLength) {
            return substr($text, 0, $maxLength) . '...';
        }
        return $text;
    }
    ?>
    <table class="table table-info">
        <thead>
            <tr>
                <th scope="col">Заголовок</th>
                <th scope="col">Содержание</th>
                <th scope="col">Статус</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($oq as $item) : ?>
                <tr>
                    <td style="max-width: 300px;"><?php echo $item['title']; ?></td>
                    <td style="max-width: 300px;"><?php echo truncateText($item['content']); ?></td>
                    <td>
                        <?php if ($item['status'] == 1) : ?>
                            <span class=" badge bg-success">Активен</span>
                        <?php else : ?>
                            <span class="badge bg-danger">Не активен</span>
                        <?php endif; ?>
                    </td>


                    <td>

                        <a href="/admin/oq/edit/<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                        <a href="/admin/oq/delete/<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Вы действительно хотите удалить строку?')"><i class="bi bi-trash text-danger"></i></a>

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