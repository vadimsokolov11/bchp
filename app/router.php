<?php

namespace app;

use controllers\home\HomeController;
use controllers\users\UsersController;
use controllers\roles\RoleController;
use controllers\pages\PageController;
use controllers\auth\AuthController;
use controllers\main\MainController;

use controllers\oq\OqController;
use controllers\about\AboutController;

use controllers\contacts\ContactsController;
use controllers\news\NewsController;
use controllers\service\ServiseController;
use controllers\testimonial\testimonialController;


use controllers\admin\service\ServiseAdminController;

use controllers\admin\news\NewsAdminController;
use controllers\admin\oq\OqAdminController;
use controllers\admin\comment\CommentAdminController;
use controllers\admin\list_service\ListServiseController;
use controllers\admin\orders\OrdersController;
use controllers\news_in_detail\NewsInDetailController;

use controllers\registered\RegisterController;






class Router
{

    private $routes = [
        // Стартовая страница

        // страница главная с профилем пользователя
        

        // '/^\/(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'home\\HomeController'], // Пользователи
        '/^\/home(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'home\\HomeController'], // Пользователи
        // Меню
        '/^\/users(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'users\\UsersController'], // Пользователи
        '/^\/roles(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'roles\\RoleController'], // Роли
        '/^\/pages(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'pages\\PageController'], // Страницы
        '/^\/main(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'main\\MainController'], // Главная

        // авторизация
        '/^\/auth(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'auth\\AuthController'],
        '/^\/(register|login|authenticate|logout)(\/(?P<action>[a-z]+))?$/' => ['controller' => 'users\\AuthController'],


        '/^\/faq(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'oq\\OqController'], // Вопросы и ответы
        '/^\/testimonial(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'testimonial\\testimonialController'], // Вопросы и ответы
        '/^\/contacts(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'contacts\\ContactsController'], // Контакты
        '/^\/news(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'news\\NewsController'], // Новости

        '/^\/news_in_detail(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'news_in_detail\\NewsInDetailController'], // Новости

        '/^\/service(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'service\\ServiseController'], // Услуги
        '/^\/about(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'about\\AboutController'], // ОТзывы


        '/^\/admin\/events(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'admin\\events\\EventsAdminController'], // Услуги
        '/^\/admin\/posts(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'admin\\posts\\PostsAdminController'], // Новости
        '/^\/admin\/oq(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'admin\\oq\\OqAdminController'], // Ответы на вопросы
        '/^\/admin\/comment(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'admin\\comment\\CommentAdminController'], // Ответы на вопросы
        '/^\/admin\/list_service(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'admin\\list_service\\ListServiseController'], // Ответы на вопросы

        '/^\/admin\/orders(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'admin\\orders\\OrdersController'], // Ответы на вопросы

        '/^\/registered(\/(?P<action>[a-z]+)(\/(?P<id>\d+))?)?$/' => ['controller' => 'registered\\RegisterController'], // Новости

       
    ];

    public function run()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $controller = null;
        $action = null;
        $params = null;

        foreach ($this->routes as $pattern => $route) {
            if (preg_match($pattern, $uri, $matches)) {
                $controller = "controllers\\" . $route['controller'];
                $action = $route['action'] ?? $matches['action'] ?? 'index';
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                break;
            }
        }

        if (!$controller) {
            http_response_code(404);
            include_once 'templates/errors/404.html';
            return;
        }

        $controllerInstance = new $controller();
        if (!method_exists($controllerInstance, $action)) {
            http_response_code(404);
            echo "Action not found!";
            return;
        }
        call_user_func_array([$controllerInstance, $action], [$params]);
    }
}
