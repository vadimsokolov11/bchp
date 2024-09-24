<?php

$title = 'Редактирование заявки';
ob_start();
?>

<h1 class="mb-4"><?= $title ?></h1>
<form method="POST" action="/admin/orders/update/<?php echo $orders['id']; ?>" enctype="multipart/form-data" class="blue-background">
    <input type="hidden" name="id" value="<?= $orders['id'] ?>">
    <div class="mb-3">
        <label for="name" class="form-label">Имя</label>
        <input type="text" class="form-control" id="name" name="name" value="<?= $orders['name'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="surname" class="form-label">Фамилия</label>
        <input type="text" class="form-control" id="surname" name="surname" value="<?= $orders['surname'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="patronymic" class="form-label">Отчество</label>
        <input type="text" class="form-control" id="patronymic" name="patronymic" value="<?= $orders['patronymic'] ?>">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Номер телефона</label>
        <input type="text" class="form-control" id="phone" name="phone" value="<?= $orders['phone'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="e_mail" class="form-label">email</label>
        <input type="text" class="form-control" id="e_mail" name="e_mail" value="<?= $orders['e_mail'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="address" class="form-label">Адрес</label>
        <input type="text" class="form-control" id="address" name="address" value="<?= $orders['address'] ?>" required>
    </div>
    <div class="mb-3">
        <label for="created_at" class="form-label">Дата и время отправления заявки</label>
        <input type="text" class="form-control" id="created_at" name="created_at" value="<?= $orders['created_at'] ?>" required>
    </div>
    <div class="mb-3">
        <label class="form-label">Статус обработки заявки</label>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="statusActive" name="status" value="1" <?= $orders['status'] == 1 ? 'checked' : '' ?>>
            <label class="form-check-label" for="statusActive">Принята</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="statusExpectation" name="status" value="2" <?= $orders['status'] == 2 ? 'checked' : '' ?>>
            <label class="form-check-label" for="statusExpectation">В ожидании</label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" id="statusInactive" name="status" value="3" <?= $orders['status'] == 3 ? 'checked' : '' ?>>
            <label class="form-check-label" for="statusInactive">Отклонена</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Редактировать</button>
</form>
<script>
    document.getElementById('statusActive').addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('statusInactive').checked = false;
            document.getElementById('statusExpectation').checked = false;
        }
    });

    document.getElementById('statusInactive').addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('statusActive').checked = false;
            document.getElementById('statusExpectation').checked = false;
        }
    });

    document.getElementById('statusExpectation').addEventListener('change', function() {
        if (this.checked) {
            document.getElementById('statusActive').checked = false;
            document.getElementById('statusInactive').checked = false;
        }
    });
</script>
<?php $content = ob_get_clean();

include 'app/views/layout/layout.php';
?>