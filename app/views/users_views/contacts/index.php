<?php


ob_start();
?>


<section id="page-banner" class="pt-200 pb-150 bg_cover" style="background-image: url(public/images/page-banner.jpg)">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-banner-content">
          <h3>Контакты</h3>
        </div>
      </div>
    </div>
  </div>
</section>

<!--====== PAGE BANNER PART ENDS ======-->

<!--====== CONACT PART START ======-->

<section id="contact-part" class="pt-30">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <div class="contact-form pt-45">
          <h6>Написать нам</h6>
          <form method="POST" action="/contacts/store">
            <div class="row">
              <div class="col-md-6">
                <div class="singel-form form-group">
                  <label>Имя :</label>
                  <input id="name" name="name" type="text" data-error="Вы не ввели имя" required="required" />
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="singel-form form-group">
                  <label>Email :</label>
                  <input id="email" type="email" name="email" data-error="Вы не ввели эл. почту" required="required" />
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="singel-form form-group">
                  <label>Сообщение :</label>
                  <textarea id="content" type="text" name="content" data-error="Вы не ввели сообщение"
                    required="required"></textarea>
                  <div class="help-block with-errors"></div>
                </div>
              </div>
              <!-- <p class="form-message"></p> -->
              <div class="col-md-12">
                <div class="singel-form">
                  <button type="submit">Отправить</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="contact-info pt-45">
          <h6>Контактная информация</h6>
          <p>
            Не стесняйтесь связаться с нами для получения информации или
            консультации по вопросам бурения и обустройства скважин.
          </p>
          <?php foreach ($contact as $item): ?>
          <ul>
            <li>
              <div class="icon">
                <i class="fa fa-map-marker"></i>
              </div>
              <div class="cont pl-15">
                <p><?= $item['address'] ?></p>
              </div>
            </li>
            <li>
              <div class="icon">
                <i class="fa fa-envelope"></i>
              </div>
              <div class="cont pl-15">
                <p><?= $item['email'] ?></p>
              </div>
            </li>
            <li>
              <div class="icon">
                <i class="fa fa-phone"></i>
              </div>
              <div class="cont pl-15">
                <p><?= $item['phone'] ?></p>
              </div>
            </li>
          </ul>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<!--====== CONACT PART ENDS ======-->

<!--====== BRAND PART START ======-->

<section id="brand-part" class="pt-70 pb-80"></section>

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