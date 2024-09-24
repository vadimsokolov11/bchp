<?php

$title = 'Добавление путешествия';
ob_start();
?>

<h1 class="mb-4"><?= $title ?></h1>
<form method="POST" action="/admin/events/store" class="blue-background">
    <div class="mb-3">
        <label for="events_name" class="form-label">Название</label>
        <input type="text" class="form-control" id="events_name" name="events_name" required>
    </div>
    <div class="mb-3">
        <label for="events_description" class="form-label">Описание</label>
        <input type="text" class="form-control" id="events_description" name="events_description" required>
    </div>
    <div class="mb-3">
        <label for="tags-select" class="form-label">Выберите теги</label>
        <select class="form-select" id="tags-select" name="tags[]" multiple>
            <option value="">Выберите теги</option>
            <?php foreach ($tags as $tag): ?>
                <option value="<?php echo $tag['id']; ?>"><?php echo $tag['tag_name']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout/layout.php';
?>