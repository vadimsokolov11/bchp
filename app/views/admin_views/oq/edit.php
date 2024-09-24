<?php

$title = 'Редактирование ответа на вопросы';
ob_start();
?>

<h1 class="mb-4"><?= $title ?></h1>
<form method="POST" action="/admin/oq/update/<?php echo $oq['id']; ?>" class="blue-background">
    <input type="hidden" name="id" value="<?= $oq['id'] ?>">
    <div class="mb-3">
        <label for="title" class="form-label">Заголовок</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $oq['title'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Содержание</label>
        <textarea type="text" class="form-control" id="content" name="content" required><?= $oq['content'] ?></textarea>
    </div>
    <div class="mb-3">
        <label class="form-label">Статус</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="statusActive" name="status" value="1" <?= $oq['status'] == 1 ? 'checked' : '' ?>>
            <label class="form-check-label" for="statusActive">Активен</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="statusInactive" name="status" value="0" <?= $oq['status'] == 0 ? 'checked' : '' ?>>
            <label class="form-check-label" for="statusInactive">Не активен</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Редактировать</button>
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