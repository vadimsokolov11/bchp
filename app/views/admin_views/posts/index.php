<?php

$title = 'Посты';
ob_start();
?>

<h1><?= $title ?></h1>

<!-- <a href="/admin/posts/create" class="btn btn-success">Добавить</a> -->

<div class="search-container">
    <label for="searchInput">Искать альбомы</label>
    <input type="text" id="searchInput" class="search-input"
        placeholder="Поиск по альбомам" onkeyup="search()">
</div>
<table class="table table-info" id="userTable">
    <thead>
        <tr>
            <!-- <th scope="col">Название</th>
                <th scope="col">Описание</th> -->
            <th scope="col">Изображение</th>
            <th scope="col">Создан</th>
           
            <th scope="col">Альбом</th>
            <th scope="col">Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($posts as $item) : ?>
            <?php
            // Преобразовать строку даты и времени в объект DateTime
            $dateC = new DateTime($item['created_at']);
            // $dateU = new DateTime($item['updated_at']);

            // Форматировать дату и время в удобочитаемом виде
            $formattedDateC = $dateC->format('d.m.Y H:i:s'); // Пример: 31.12.2023 23:59:59
            // $formattedDateU = $dateU->format('d.m.Y H:i:s'); // Пример: 31.12.2023 23:59:59
            ?>
            <tr>
                <!-- <td><?php echo $item['img_name']; ?></td>
                    <td><?php echo $item['description']; ?></td> -->
                <td>
                    <img src="<?= $item['path_img']; ?>" alt="Изображение" style="width: 200px; height: 150px; object-fit: cover;">
                </td>
                <td class="table-cell-dateC"><?php echo htmlspecialchars($formattedDateC); ?></td>
                <td><?php echo $item['album_name']; ?></td>
                   
                <td>

                    <a href="/admin/news/edit/<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                    <a href="/admin/posts/delete/<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Вы действительно хотите удалить услугу?')"> <i class="bi bi-trash text-danger"></i></a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


<script>
    function search() {
        // Получаем значение из поля ввода, удаляем запятые и приводим к нижнему регистру
        const query = $('#searchInput').val().replace(/,/g, '').toLowerCase();
        // Получаем все строки таблицы
        const rows = $('#userTable tbody tr');

        rows.each(function() {
            // Получаем текст из соответствующего столбца, удаляем запятые и приводим к нижнему регистру
            const tags = $(this).find('td:nth-child(3)').text().replace(/,/g, '').toLowerCase();

            // Проверяем, содержит ли строка теги, которые совпадают с запросом
            if (tags.includes(query)) {
                $(this).show(); // Показываем строку, если совпадение найдено
            } else {
                $(this).hide(); // Скрываем строку, если совпадение не найдено
            }
        });
    }
</script>

<?php $content = ob_get_clean();

include 'app/views/layout/layout.php';
?>