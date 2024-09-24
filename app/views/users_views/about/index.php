<?php


ob_start();
?>
<section id="page-banner" class="pt-200 pb-150 bg_cover" style="background-image: url(public/images/page-banner.jpg)">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-banner-content">
          <h3>О нас</h3>
        </div>
      </div>
    </div>
  </div>
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== ABOUT PART START ======-->

<section id="about-part" class="pt-60">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center pb-15">
          <h2>О нас</h2>
          <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
          </ul>
          <p>
            Мы — команда профессионалов, специализирующихся на скважин. С
            нами водоснабжение в надежных руках. Наш опыт, передовые
            технологии и подход, обеспечивают эффективные решения. Стремимся
            создавать не только качественные скважины, но и долгосрочные
            отношения с клиентами. Доверьте нам заботу о воде.
          </p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-6">
        <div class="about-content mt-30">
          <h3><span>Дорогие клиенты и партнеры!</span> Fresh Water.</h3>
          <p>
            Приветствую вас на страницах нашего виртуального дома. Великая
            честь возглавлять этот проект, направленный на обеспечение
            водоснабжения. Мы стремимся к высоким стандартам в сфере бурения
            и обустройства скважин, инновационным подходам и ответственному
            обслуживанию. Наша цель - не только предоставить надежный
            источник воды, но и создать опыт долгосрочного сотрудничества.
            Благодарим вас за выбор нашей компании. Мы готовы предоставить
            лучшие решения для водоснабжения.
          </p>
          <!-- <img src="public/images/sing.png" alt="Signature" /> -->
        </div>
      </div>
      <div class="col-lg-5 offset-lg-1">
        <div class="about-image mt-30">
          <img src="public/images/about.jpg" alt="About" />
        </div>
      </div>
    </div>
  </div>
</section>

<!--====== ABOUT PART ENDS ======-->

<!--====== video PART START ======-->

<section id="video-part" class="pt-70">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <h2>Видео о нашей компании</h2>
          <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
          </ul>
          <p>
            Ознакомьтесь с опытом, технологиями и проектами через видео.
            Узнайте, почему мы - надежный партнер для водоснабжения.
            Приглашаем в виртуальное путешествие по нашей деятельности
          </p>
        </div>
      </div>
    </div>
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="video pt-45">
          <img src="public/images/video.jpg" alt="Video" />
          <div class="icon">
            <a class="videi-popup"
              href="https://www.youtube.com/watch?v=BgZ4BpC0-aE&ab_channel=%D0%A3%D1%80%D0%B0%D0%BB%D0%93%D0%B8%D0%B4%D1%80%D0%BE"><i
                class="fa fa-play"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--====== video PART ENDS ======-->

<!--====== CLIENT PART START ======-->

<section id="client-part" class="pt-80">
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

      <div class="client-slied owl-carousel">
      <?php foreach ($comment as $item): ?>
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
  </div>
</section>

<!--====== CLIENT PART ENDS ======-->

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