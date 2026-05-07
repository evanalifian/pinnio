<?php

use App\Pinnio\Config\Router;
use App\Pinnio\Controller\AuthController;
use App\Pinnio\Controller\HomeController;
use App\Pinnio\Controller\SignupController;
use App\Pinnio\Controller\UserController;
use App\Pinnio\Middleware\AuthMiddleware;

require_once __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$home = new HomeController();
$signup = new SignupController();
$auth = new AuthController();
$account = new UserController();

Router::add("/", "GET", fn() => $home->landing(), fn() => AuthMiddleware::isAuth());
Router::add("/home", "GET", fn() => $home->home(), fn() => AuthMiddleware::isNotAuth());


Router::add("/account", "GET", fn() => $account->page(), fn() => AuthMiddleware::isNotAuth());
Router::add("/account/update", "POST", fn() => $account->update(), fn() => AuthMiddleware::isNotAuth());
Router::add("/account/delete", "GET", fn() => $account->delete(), fn() => AuthMiddleware::isNotAuth());


Router::add("/signup", "GET", fn() => $signup->page(), fn() => AuthMiddleware::isAuth());
Router::add("/signup", "POST", fn() => $signup->save(), fn() => AuthMiddleware::isAuth());


Router::add("/login", "GET", fn() => $auth->page(), fn() => AuthMiddleware::isAuth());
Router::add("/login", "POST", fn() => $auth->auth(), fn() => AuthMiddleware::isAuth());


Router::add("/logout", "GET", fn() => $auth->logout(), fn() => AuthMiddleware::isNotAuth());

Router::execute();