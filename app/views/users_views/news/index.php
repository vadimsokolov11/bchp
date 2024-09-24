<?php


ob_start();
?>


<section id="page-banner" class="pt-200 pb-150 bg_cover" style="background-image: url(public/images/page-banner.jpg)">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-banner-content">
          <h3>Новости</h3>
        </div>
      </div>
    </div>
  </div>
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== BLOG PART START ======-->

<section id="blog-part" class="pt-65">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center pb-15">
          <h2>Свежие Новости</h2>
          <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
          </ul>
          <p>
            Последние обновления в мире компании. Поддерживаем в курсе новых
            разработок, технологических инноваций и успешных проектов.
            Оставайтесь в центре происходящего с свежими новостями, и будьте
            в курсе того, как мы продолжаем обеспечивать надежное
            водоснабжение для клиентов
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <?php foreach ($news as $item): ?>
        <div class="col-lg-4 col-md-6">
          <div class="singel-blog mt-30">
            <div class="blog-thum">
            <img src="<?= $item['img'] ?>" alt="Изображение">
              <div class="date text-center">
                <h3>
                  <?php
                  $item['created_at'] = '2024-04-17 17:09:17';
                  $date = new DateTime($item['created_at']);
                  echo '<span style="font-size: 20px;">' . $date->format('d') . '</span>'; // Выведет, например, "<span>17</span>"
                  ?>
                </h3>
                <span>
                  <?php
                  $item['created_at'] = '2024-04-17 17:09:17';
                  $date = new DateTime($item['created_at']);
                  echo '<span>' . $date->format('F Y') . '</span>'; // Выведет, например, "<span>17 апреля</span>"
                  ?>
                </span>
              </div>
            </div>
            <div class="blog-cont pt-25">
              <a href="#">
                <h5><?= $item['title'] ?></h5>
              </a>
              <p>
                <?= $item['description'] ?>
              </p>
              <a href="/news_in_detail/edit/<?php echo $item['id']; ?>"
                        class="btn btn-sm btn-outline-primary">Подробнее</a>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!--====== BLOG PART ENDS ======-->

<!--====== BRAND PART START ======-->

<section id="brand-part" class="pt-65 pb-80"></section>

<!--====== BRAND PART ENDS ======-->

<!--====== DELIVERY PART START ======-->

<section id="delivery-part" class="delivery-part-2 bg_cover pt-95 pb-100" data-overlay="8"
  style="background-image: url(public/images/bg-2.jpg)">
  <div class="container">
    <div class="row align-items-center">
      <div class="col-lg-7 offset-xl-1">
        <div class="delivery-text text-center pb-30">
          <h2>Бурение - Пробурим до самых Истоков</h2>
          <p>
            Откройте новые горизонты водоснабжения с нашими услугами по
            бурению. Гарантируем глубокое проникновение в земные слои,
            обеспечивая стабильный и долгосрочный источник чистой воды.
            Возложите доверие на наш опыт
          </p>
          <a href="/home#order">Узнать больше</a>
        </div>
      </div>
    </div>
  </div>
  <div class="delivery-image d-none d-lg-flex align-items-end">
    <img src="public/images/delivery-van.jpg" alt="Iamge" />
  </div>
</section>
<?php $content = ob_get_clean();

include 'app/views/layout/layout_user.php';
?>