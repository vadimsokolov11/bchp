<?php

$title = 'Заявки';
ob_start();
?>

<h1><?= $title ?></h1>
<?php if ($sessionData['user_role'] <= 3) : ?>



    <table class="table table-info">
        <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Фамилия</th>
                <th scope="col">Отчество</th>
                <th scope="col">Номер телефона</th>
                <th scope="col">email</th>
                <th scope="col">Адрес</th>
                <th scope="col">Дата и время отправления заявки</th>
                <th scope="col">Статус</th>
                <th scope="col">Действия</th>

            </tr>
        </thead>
        <tbody>
            <?php foreach ($orders as $item) : ?>
                <tr>
                    <td style="max-width: 300px;"><?php echo $item['name']; ?></td>
                    <td style="max-width: 300px;"><?php echo $item['surname']; ?></td>
                    <td style="max-width: 300px;"><?php echo $item['patronymic']; ?></td>
                    <td style="max-width: 300px;"><?php echo $item['phone']; ?></td>
                    <td style="max-width: 300px;"><?php echo $item['e_mail']; ?></td>
                    <td style="max-width: 300px;"><?php echo $item['address']; ?></td>
                    <td style="max-width: 300px;"><?php echo $item['created_at']; ?></td>
                    <td>
                        <?php if ($item['status'] == 1) : ?>
                            <span class="badge bg-success">Принята</span>
                        <?php elseif ($item['status'] == 2) : ?>
                            <span class="badge bg-warning">В ожидании</span>
                        <?php else : ?>
                            <span class="badge bg-danger">Отклонена</span>
                        <?php endif; ?>
                    </td>


                    <td>

                        <a href="/admin/orders/edit/<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-primary"><i class="bi bi-pencil"></i></a>
                        <a href="/admin/orders/delete/<?php echo $item['id']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Вы действительно хотите удалить строку?')"><i class="bi bi-trash text-danger"></i></a>

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