<?php

$title = 'Главная';
ob_start();
?>

<h1><?= $title ?></h1>
<style>
    .badge-box {
        display: inline-block;
        width: 12%;
        text-align: center;
        margin: 0.5%;
        padding: 0.5rem;
        border-radius: 0.25rem;
    }

    .badge-box h5 {
        font-size: 1rem;
        margin-bottom: 0.5rem;
    }

    .badge-box p {
        font-size: 0.75rem;
        margin: 0;
    }
</style>
<h3>Добро пожаловать, <?php echo $sessionData['name'] . ' ' . $sessionData['patronymic']; ?>!</h3>
<div class="container mt-4 text-center">

    <!-- Плашка 1 -->
    <div class="badge-box bg-primary text-white">
        <h5>Количество отзывов</h5>
        <p><?php echo $comment['count'] ?></p>
    </div>

    <!-- Плашка 2 -->
    <div class="badge-box bg-secondary text-white">
        <h5>Количество списка услуг</h5>
        <p><?php echo $list_servies['count'] ?></p>
    </div>

    <!-- Плашка 3 -->
    <div class="badge-box bg-success text-white">
        <h5>Количество новостей</h5>
        <p><?php echo $news['count'] ?></p>
    </div>

    <!-- Плашка 4 -->
    <div class="badge-box bg-danger text-white">
        <h5>Количество вопросов и ответов</h5>
        <p><?php echo $oq['count'] ?></p>
    </div>

    <!-- Плашка 5 -->
    <div class="badge-box bg-warning text-dark">
        <h5>Количество заявок</h5>
        <p><?php echo $orders['count'] ?></p>
    </div>

    <!-- Плашка 6 -->
    <div class="badge-box bg-info text-white">
        <h5>Количество услуг</h5>
        <p><?php echo $servies['count'] ?></p>
    </div>

    <!-- Плашка 7 -->
    <div class="badge-box bg-light text-dark">
        <h5>Количество пользователей</h5>
        <p><?php echo $users['count'] ?></p>
    </div>
</div>
<?php $content = ob_get_clean();

include 'app/views/layout/layout.php';
?>