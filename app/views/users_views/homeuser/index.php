<?php
ob_start();
?>

<section id="slider-part-3">
  <div class="content-slied">
    <div class="single-slider bg_cover d-flex align-items-center" style="background-image: url(public/images/slider/s-1.jpg)">
      <div class="container">
        <div class="row align-items-center">
          <div class="col-lg-4">
            <div class="slider-image d-none d-lg-block">
              <img data-animation="fadeInLeft" data-delay="1s" src="public/images/glass.jpg" alt="Image" />
            </div>
          </div>
          <div class="col-xl-7 offset-xl-1 col-lg-8">
            <div class="slider-content text-center">
              <h2 data-animation="fadeInUp" data-delay="1.5s">
                Эффективное бурение скважин с надежной командой и передовыми
                технологиями
              </h2>
              <p data-animation="fadeInUp" data-delay="2s">
                Специализируемся на бурении скважин с использованием
                передовых технологий и высококвалифицированных специалистов,
                обеспечиваем выполнение проектов.
              </p>
              <a data-animation="fadeInUp" data-delay="2.5s" href="#order">Узнать больше</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--====== SLIDER PART ENDS ======-->

<!--====== BUY PRODUCTS PART START ======-->
<section id="order">
  <div id="buy-products-part" class="pt-50 pb-80">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-10">
          <div class="products-form">
            <form id="form" method="POST" action="/home/store">
              <div class="row">
                <div class="col-md-4 col-sm-6">
                  <div class="form-box">
                    <input type="text" class="form-control" id="name" name="name" placeholder="Ваше имя ..." required="required">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="form-box">
                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Ваше фамилия ..." required="required">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="form-box">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Ваш телефон ..." required="required" data-inputmask="'mask': '+7 (999) 999-99-99'">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="form-box">
                    <input type="text" class="form-control" id="e_mail" name="e_mail" placeholder="Ваш e_mail ..." required="required">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="form-box">
                    <input type="text" class="form-control" id="address" name="address" placeholder="Ваше адрес ..." required="required">
                  </div>
                </div>
                <div class="col-md-4 col-sm-6">
                  <div class="form-box">
                    <button type="submit" onclick="return validateForm()">
                      Отправить <i class="fa fa-arrow-right"></i>
                    </button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--====== BUY PRODUCTS PART ENDS ======-->

<!--====== SERVICES PART START ======-->

<section id="services-part" class="services-part-3 pt-70">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center">
          <h2>Почему именно мы?</h2>
          <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
          </ul>
          <p>
            Профессиональное бурение с гарантированным результатом. Наши
            специалисты – профессионалы, использующие современные технологии
          </p>
        </div>
      </div>
    </div>
    <div class="row align-items-center">
      <div class="col-lg-4">
        <div class="singel-services mt-45 pb-50">
          <div class="services-icon">
            <img src="public/images/choose-us/icon-1.png" alt="Icon" />
          </div>
          <div class="services-cont pt-25">
            <h4>Безопасность и качество воды</h4>
            <p>
              Предлагаем проверку воды на содержание вредных веществ и
              бактерий. Получите подробный отчет для обеспечения
              водоснабжения
            </p>
          </div>
        </div>

        <div class="singel-services">
          <div class="services-icon">
            <img src="public/images/choose-us/icon-3.png" alt="Icon" />
          </div>
          <div class="services-cont pt-25">
            <h4>Обеспечиваем очищение и обеззараживание воды</h4>
            <p>
              Вода будет свободна от вредных примесей и микроорганизмов.
              Обеспечьте чистоту в каждой капле – выбирайте нас для
              обработки воды
            </p>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="singel-services mt-50 text-center">
          <img src="public/images/choose-us/services-2.jpg" alt="Image" />
        </div>
      </div>
      <div class="col-lg-4">
        <div class="singel-services right mt-45 text-right pb-50">
          <div class="services-icon">
            <img src="public/images/choose-us/icon-2.png" alt="Icon" />
          </div>
          <div class="services-cont pt-25">
            <h4>Чистая вода</h4>
            <p>
              Обеспечьте дом или предприятие чистой водой. Забудьте о
              сомнениях – выберите нас для надежного водоснабжения
            </p>
          </div>
        </div>

        <div class="singel-services right text-right">
          <div class="services-icon">
            <img src="public/images/choose-us/icon-4.png" alt="Icon" />
          </div>
          <div class="services-cont pt-25">
            <h4>Экологичность</h4>
            <p>
              Бережно относимся к окружающей среде. Технологии бурения и
              обустройства разрабатываются с учетом экологических
              стандартов. Обеспечим чистую воду, и сбережём планету
            </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!--====== SERVICES PART ENDS ======-->

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
                  <a class="cart-add" href="#order">Заказать</a>
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
          <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
          </ul>
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
            <a href="#order">Заказать сейчас</a>
          </div>
        </div>
      <?php endforeach; ?>


    </div>
  </div>
</section>

<!--====== PRICING PART ENDS ======-->

<!--====== DELIVERY PART START ======-->

<section id="delivery-part" class="delivery-part-2 bg_cover pt-95 pb-100" data-overlay="8" style="background-image: url(public/images/bg-2.jpg)">
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
          <a href="#order">Узнать больше</a>
        </div>
      </div>
    </div>
  </div>
  <div class="delivery-image d-none d-lg-flex align-items-end">
    <img src="public/images/delivery-van.jpg" alt="Iamge" />
  </div>
</section>

<!--====== DELIVERY PART ENDS ======-->

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
            <a class="videi-popup" href="https://rutube.ru/video/4c1c61857b070c1e55d502e6c4d8e14a/?r=wd"><i class="fa fa-play"></i></a>
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
  </div>
</section>

<!--====== CLIENT PART ENDS ======-->

<!--====== BLOG PART START ======-->

<section id="blog-part" class="pt-70">
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
      <div class="blog-slied owl-carousel">
        <?php foreach ($news as $item) : ?>
          <div class="col-lg-12">
            <div class="singel-blog mt-30">
              <div class="blog-thum">
                <img src="<?= $item['img'] ?>" alt="Изображение">
                <div class="date text-center">
                  <?php
                  $item['created_at'] = '2024-04-17 17:09:17';
                  $date = new DateTime($item['created_at']);
                  echo '<span style="font-size: 20px;">' . $date->format('d') . '</span>'; // Выведет, например, "<span>17</span>"
                  ?>
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
                <a href="#">Подробнее</a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<!--====== BLOG PART ENDS ======-->

<!--====== BRAND PART START ======-->

<div id="brand-part" class="pt-60 pb-80"></div>

<!--====== BRAND PART ENDS ======-->

<!--====== FOOTER PART START ======-->
<script src="https://cdn.jsdelivr.net/npm/inputmask"></script>
<script>
  document.addEventListener("DOMContentLoaded", function() {
    Inputmask().mask(document.getElementById("phone"));
  });


  const nameInput = document.getElementById("name");

  nameInput.addEventListener("input", function() {
    const namePattern = /^[А-Яа-яЁё\s]+$/;
    const name = nameInput.value;

    if (!name.match(namePattern)) {
      nameInput.setCustomValidity("Пожалуйста, введите корректное имя без цифр и знаков");
    } else {
      nameInput.setCustomValidity("");
    }
  });

  const surnameInput = document.getElementById("surname");

  surnameInput.addEventListener("input", function() {
    const surnamePattern = /^[А-Яа-яЁё\s]+$/;
    const surname = surnamePattern.value;

    if (!name.match(namePattern)) {
      surnameInput.setCustomValidity("Пожалуйста, введите корректную фамилию без цифр и знаков");
    } else {
      surnameInput.setCustomValidity("");
    }
  });

  const emailInput = document.getElementById("e_mail");

  emailInput.addEventListener("input", function() {
    const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    const email = emailInput.value;

    if (!email.match(emailPattern)) {
      emailInput.setCustomValidity("Пожалуйста, введите корректный адрес электронной почты.");
    } else {
      emailInput.setCustomValidity("");
    }
  });
</script>


<?php $content = ob_get_clean();

include 'app/views/layout/layout_user.php';
?>