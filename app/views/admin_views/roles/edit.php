<?php

$title = 'Редактирование роли';
ob_start();
?>

<h1 class="mb-4"><?= $title ?></h1>
<form method="POST" action="/roles/update/<?php echo $role['id']; ?>" class="blue-background">
    <input type="hidden" name="id" value="<?= $role['id'] ?>">
    <div class="mb-3">
        <label for="role_name" class="form-label">Название</label>
        <input type="text" class="form-control" id="role_name" name="role_name" value="<?= $role['role_name'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="role_description" class="form-label">Описание</label>
        <textarea class="form-control" id="role_description" name="role_description" required><?= $role['role_description'] ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Редактировать</button>
</form>

<?php $content = ob_get_clean();

include 'app/views/layout/layout.php';
?>