<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8" />
    <title>Больше чем путешествия!</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
    <!-- App favicon -->
    <link rel="shortcut icon" href="/img/favicon/ktm.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/css/style.css">

    <!-- Plugins css -->
    <link href="/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/daterangepicker/daterangepicker.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/theme.min.css" rel="stylesheet" type="text/css" />


</head>

<body>
    <div id="layout-wrapper">

        <header id="page-topbar">
            <div class="navbar-header">
                <div class="navbar-brand-box d-flex align-items-left">
                    <a href="/main" class="logo">
                        <span>
                            Больше чем путешествия!
                        </span>
                    </a>

                    <button type="button" class="btn btn-sm mr-2 d-lg-none px-3 font-size-16 header-item waves-effect waves-light" id="vertical-menu-btn">
                        <i class="fa fa-fw fa-bars"></i>
                    </button>
                </div>

                <div class="d-flex align-items-center">


                    <div class="dropdown d-inline-block ml-2">
                        <button type="button" class="btn header-item waves-effect waves-light" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="rounded-circle header-profile-user" src="assets/images/users/avatar-3.jpg" alt="Header Avatar">
                            <span class="d-none d-sm-inline-block ml-1">Madhly</span>
                            <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                Настройки
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="javascript:void(0)">
                                <span>Профиль</span>
                            </a>
                            <a class="dropdown-item d-flex align-items-center justify-content-between" href="/auth/logout">
                                <span>Выход</span>
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <div class="vertical-menu">

            <div data-simplebar class="h-100">

                <div id="sidebar-menu">
                    <ul class="metismenu list-unstyled" id="side-menu">

                        <!-- <li>
                            <a href="/main" class="waves-effect"><i class="feather-home"></i><span>Главная</span></a>
                        </li> -->


                        <!-- <li>
                            <a href="javascript: void(0);" class="has-arrow waves-effect"><i class="feather-user"></i><span>Пользователи</span></a>
                            <ul class="sub-menu" aria-expanded="false">
                                <li><a href="/users">Пользователи</a></li>
                                <li><a href="/roles">Роли</a></li>

                            </ul>
                        </li> -->
                        <!-- <li>
                            <a href="/admin/list_service" class="waves-effect"><i class="feather-book-open"></i><span>Список услуг</span></a>
                        </li> -->
                        <li>
                            <a href="/admin/events" class="waves-effect"><i class="feather-book-open"></i><span>Путешествия</span></a>
                        </li>

                        <li>
                            <a href="/admin/posts" class="waves-effect"><i class="feather-book-open"></i><span>Посты</span></a>
                        </li>
                        <li>
                            <a id="downloadButton" class="waves-effect"><i class="feather-book-open"></i><span>VR-тур по Шерегешу</span></a>
                        </li>
                        <!-- <li>
                            <a href="/admin/oq" class="waves-effect"><i class="feather-book-open"></i><span>Ответы на вопросы</span></a>
                        </li>
                        <li>
                            <a href="/admin/comment" class="waves-effect"><i class="feather-book-open"></i><span>Отзывы</span></a>
                        </li>
                        <li>
                            <a href="/admin/orders" class="waves-effect"><i class="feather-book-open"></i><span>Заявки</span></a>
                        </li> -->
                    </ul>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-12">
                            <!-- <div class="page-title-box d-flex align-items-center justify-content-between"> -->
                            <?php echo $content; ?>
                            <!-- </div> -->
                        </div>
                    </div>

                </div>
            </div>
            <!-- <footer class="footer">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-6">
                            2024 © АСУП ООО "УК"Кузбасстрансмет".
                        </div>
                    </div>
                </div>
            </footer> -->

        </div>

    </div>

    <!-- Overlay-->
    <div class="menu-overlay"></div>


    <script>
        document.getElementById('downloadButton').addEventListener('click', function() {
    // Извлекаем ID из вашей ссылки
    const fileId = '13pFqFYhF7nK9E5tnr5gGXJdE3Y2-aKzJ';
    const fileUrl = `https://drive.google.com/uc?export=download&id=${fileId}`;

    // Создаем временную ссылку
    const a = document.createElement('a');
    a.href = fileUrl;
    a.download = 'vr_application.zip'; // Имя файла, которое будет у пользователя после скачивания
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
});
    </script>
    <!-- jQuery  -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/metismenu.min.js"></script>

    <!-- Plugins js -->
    <script src="/plugins/autonumeric/autoNumeric-min.js"></script>
    <script src="/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
    <script src="/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js"></script>
    <script src="/plugins/moment/moment.js"></script>
    <script src="/plugins/daterangepicker/daterangepicker.js"></script>
    <script src="/plugins/select2/select2.min.js"></script>
    <script src="/plugins/switchery/switchery.min.js"></script>
    <script src="/plugins/bootstrap-colorpicker/bootstrap-colorpicker.min.js"></script>
    <script src="/plugins/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
    <!-- App js -->
    <script src="/assets/js/theme.js"></script>



    <script src="/models/report/worker.js"></script>
    <!-- Public js -->
    <script src="/public/js/check-select/check-select.js"></script>
    <script src="/public/js/calculate-list-plan/calculate-list-plan.js"></script>
    <!-- <script src="/public/js/validation/validation.js"></script> -->

</body>

</html>