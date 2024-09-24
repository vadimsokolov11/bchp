<?php

$title = 'Редактирование услуги';
ob_start();
?>

<h1 class="mb-4"><?= $title ?></h1>
<form method="POST" action="/admin/list_service/update/<?php echo $list_servies['id']; ?>" enctype="multipart/form-data" class="blue-background">
    <input type="hidden" name="id" value="<?= $list_servies['id'] ?>">
    <div class="mb-3">
        <label for="title" class="form-label">Название</label>
        <input type="text" class="form-control" id="title" name="title" value="<?= $list_servies['title'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Описание</label>
        <textarea type="text" class="form-control" id="content" name="content" required><?= $list_servies['content'] ?></textarea>
    </div>
    <div class="mb-3">
        <label for="img" class="form-label">Изображение</label>
        <img src="<?= htmlspecialchars($list_servies['img']); ?>" alt="Изображение" style="width: 200px; height: 150px; object-fit: cover; display: block; margin-bottom: 10px;">
        <input type="file" class="form-control-file" id="img" name="img" value="<?= htmlspecialchars($list_servies['img']); ?>" accept="image/*">
    </div>
    <div class="mb-3">
        <label class="form-label">Статус</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="statusActive" name="status" value="1" <?= $list_servies['status'] == 1 ? 'checked' : '' ?>>
            <label class="form-check-label" for="statusActive">Активен</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="statusInactive" name="status" value="0" <?= $list_servies['status'] == 0 ? 'checked' : '' ?>>
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