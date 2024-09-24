<?php

$title = 'Добавление отзыва';
ob_start();
?>

<h1 class="mb-4"><?= $title ?></h1>
<form method="POST" action="/admin/comment/store" class="blue-background">
    <div class="mb-3">
        <label for="FIO" class="form-label">ФИО</label>
        <input type="text" class="form-control" id="FIO" name="FIO">
    </div>
    <div class="mb-3">
        <label for="img" class="form-label">Изображение</label>
        <input type="file" class="form-control-file" id="img" name="img" accept="image/*">
    </div>
    <div class="mb-3">
        <label for="text" class="form-label">Содержание</label>
        <textarea type="text" class="form-control" id="text" name="text" required></textarea>
    </div>
    <div class="mb-3">
        <label for="status" class="form-label">Статус</label>
    </div>

    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="statusActive" name="status" value="1">
        <label class="form-check-label" for="statusActive">
            Активен
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" type="checkbox" id="statusInactive" name="status" value="0">
        <label class="form-check-label" for="statusInactive">
            Не активен
        </label>
    </div>
    <button type="submit" class="btn btn-primary">Добавить</button>
</form>
<script>
    document.getElementById('statusActive').addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('statusInactive').checked = false;
        }
    });

    document.getElementById('statusInactive').addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('statusActive').checked = false;
        }
    });
</script>
<?php $content = ob_get_clean();

include 'app/views/layout/layout.php';
?>