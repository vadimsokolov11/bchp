<?php

$title = 'Путешествия';
ob_start();
?>

<h1><?= $title ?></h1>

<a href="/admin/events/create" class="btn btn-success">Добавить путешествия</a>

<div class="search-container">
    <label for="searchInput">Искать теги</label>
    <input type="text" id="sortInput" class="search-input"
        placeholder="Поиск по тегам" onkeyup="sort()">
</div>

<table class="table table-info" id="userTable">
    <thead>
        <tr>
            <th scope="col">Название</th>
            <th scope="col">Описание</th>
            <th scope="col">Дата создания</th>
            <th scope="col">Теги</th>
            <th scope="col">Действия</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($uniqueEvents as $item) : ?>
            <tr>
                <td><?php echo $item['event_name']; ?></td>
                <td><?php echo $item['event_description']; ?></td>
                <td><?php echo $item['created_at']; ?></td>
                <td><?php echo implode(", ", $item['tags']); ?></td>
                <td>
                    <a href="/admin/events/edit/<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-primary">Мои события</a>
                    <a href="/admin/service/delete/<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Вы действительно хотите удалить услугу?')"><i class="bi bi-trash text-danger"></i></a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<script>



    function sort() {

        const query = $('#sortInput').val().replace(/,/g, '').toLowerCase();

        const rows = $('#userTable tbody tr');

        rows.each(function() {

            const tags = $(this).find('td:nth-child(4)').text().replace(/,/g, '').toLowerCase();


            if (tags.includes(query)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
</script>

<?php $content = ob_get_clean();

include 'app/views/layout/layout.php';
?>