<?php


ob_start(); 
?>

<section
      id="page-banner"
      class="pt-200 pb-150 bg_cover"
      style="background-image: url(public/images/page-banner.jpg)"
    >
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="page-banner-content">
              <h3></h3>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!--====== PAGE BANNER PART ENDS ======-->

    <!--====== CLIENT PART START ======-->

    <section id="client-part" class="pt-70">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="section-title text-center">
              <img src="public/images/client/c.png" alt="icon" />
              <h2>Отзывы наших клиентов</h2>
              <ul>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
                <li></li>
              </ul>
              <p>
                Лучший показатель качества – довольные клиенты. В этом разделе
                вы найдете реальные отзывы о наших услугах по бурению и
                обустройству скважин. Доверьтесь опыту тех, кто уже оценил наш
                профессионализм и эффективность. Ваше доверие – наша ценность, и
                мы гордимся нашими успешными проектами, созданными вместе с вами
              </p>
            </div>
          </div>
        </div>
        <div class="row">
        <?php foreach ($comment as $item): ?>
          <div class="col-lg-6">
            <div class="singel-client mt-50">
              <div class="client-thum">
                <div class="client-img">
                  <img src="public/images/client/c-1.jpg" alt="Client" />
                </div>
                <div class="client-head">
                  <h5><?= $item['FIO'] ?></h5>
                </div>
              </div>
              <div class="client-text mt-35">
                <p>
                <?= $item['text'] ?>
                </p>
              </div>
            </div>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
    </section>

    <!--====== CLIENT PART ENDS ======-->

    <!--====== BRAND PART START ======-->

    <section id="brand-part" class="pt-70 pb-80"></section>

    <!--====== BRAND PART ENDS ======-->

    <!--====== DELIVERY PART START ======-->

    <section
      id="delivery-part"
      class="delivery-part-2 bg_cover pt-95 pb-100"
      data-overlay="8"
      style="background-image: url(public/images/bg-2.jpg)"
    >
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