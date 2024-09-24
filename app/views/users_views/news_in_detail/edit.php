<?php


ob_start();
?>

<style>
.blog-cont {
    font-size: 16px; 
    line-height: 1.6;
    color: #333;
    padding: 10px;
    background-color: #f9f9f9;
    border: 1px solid #ccc;
    border-radius: 5px;
}
</style>
<section id="page-banner" class="pt-200 pb-150 bg_cover" style="background-image: url(/public/images/page-banner.jpg)">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-banner-content">
          <h3> <?php echo $news['title'] ?></h3>
        </div>
      </div>
    </div>
  </div>
</section>

<section id="blog-part" class="pt-65">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-8">
        <div class="section-title text-center pb-15">
        <img src="<?php echo $news['img'] ?>" alt="Изображение">
          <ul>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
          </ul>
          <p>
          <?php echo $news['description'] ?>
          </p>
        </div>
      </div>
    </div>
    <div class="blog-cont m-4"> <?php echo $news['content'] ?></div>
   
  </div>
</section>

<!--====== DELIVERY PART START ======-->

<section id="delivery-part" class="delivery-part-2 bg_cover pt-95 pb-100" data-overlay="8"
  style="background-image: url(/public/images/bg-2.jpg)">
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
    <img src="/public/images/delivery-van.jpg" alt="Iamge" />
  </div>
</section>
<?php $content = ob_get_clean();

include 'app/views/layout/layout_user.php';
?>