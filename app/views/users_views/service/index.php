<?php

$title = 'Страницы';
ob_start();
?>


<section id="page-banner" class="pt-200 pb-150 bg_cover" style="background-image: url(public/images//page-banner.jpg)">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-banner-content">
          <h3>Наши услуги</h3>
        </div>
      </div>
    </div>
  </div>
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== PRODUCTS PART START ======-->

<section id="products-part" class="pt-65">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center pb-15">
          <h2>Услуги по Бурению и Водоснабжению</h2>
          <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
          </ul>
          <p>
            Решения в бурении и обустройстве скважин. Гарантированное
            водоснабжение для домов, предприятий и коммерческих объектов.
            Обеспечиваем надежные источники воды под ключ
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="products-slied owl-carousel">
        <?php foreach ($list_servies as $item) : ?>
          <div class="col-lg-12">
            <div class="singel-products mt-30">
              <div class="products-image">
                <div class="products-image">
                  <img src="<?= $item['img'] ?>" alt="Изображение">
                </div>
              </div>
              <div class="products-contant">
                <h6 class="products-title">
                  <a href="#"><?= $item['title'] ?></a>
                </h6>
                <div><?= $item['content'] ?></div>

                <div class="products-cart">
                  <a class="cart-add" href="/home#order">Заказать</a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!--====== PRODUCTS PART ENDS ======-->

<!--====== PRICING PART START ======-->

<section id="pricing-part" class="pt-70 pb-80">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center pb-15">
          <h2>Услуги по бурению и обустройству скважин</h2>
          <p>
            Выбирайте услуги с прозрачной ценовой политикой для
            водоснабжения и обустройства скважин. Ценами за каждый метр
            обеспечиваемого водопровода
          </p>
        </div>
      </div>
    </div>

    <div class="row">
      <?php foreach ($servies as $item) : ?>
        <div class="col-lg-6 col-md-6">
          <div class="singel-pricing gray-bg text-center mt-30">
            <h4><?= $item['title'] ?></h4>
            <h3>от <?= $item['price'] ?> т.р.</h3>
            <ul>
              <?= $item['content'] ?>
            </ul>
            <a href="/home#order">Заказать сейчас</a>
          </div>
        </div>
      <?php endforeach; ?>


    </div>
  </div>
</section>
<!--====== PRICING PART ENDS ======-->

<!--====== CLIENT PART START ======-->

<section id="client-part" class="pt-80">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <img src="public/images//client/c.png" alt="icon" />
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

      <div class="client-slied owl-carousel">
        <?php foreach ($comment as $item) : ?>
          <div class="col-lg-12">

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

<section id="delivery-part" class="delivery-part-2 bg_cover pt-95 pb-100" data-overlay="8" style="background-image: url(public/images//bg-2.jpg)">
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
    <img src="public/images//delivery-van.jpg" alt="Iamge" />
  </div>
</section>
<?php $content = ob_get_clean();

include 'app/views/layout/layout_user.php';
?>