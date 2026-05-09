<?php

use App\Pinnio\Config\Router;
use App\Pinnio\Controller\AuthController;
use App\Pinnio\Controller\HomeController;
use App\Pinnio\Controller\MemeController;
use App\Pinnio\Controller\ProfileController;
use App\Pinnio\Controller\SignupController;
use App\Pinnio\Middleware\AuthMiddleware;

require_once __DIR__ . "/vendor/autoload.php";

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$home = new HomeController();
$signup = new SignupController();
$auth = new AuthController();
$profile = new ProfileController();
$meme = new MemeController();

Router::add("/", "GET", fn() => $home->landing(), fn() => AuthMiddleware::isAuth());
Router::add("/home", "GET", fn() => $home->home(), fn() => AuthMiddleware::isNotAuth());


Router::add("/profile", "GET", fn() => $profile->page(), fn() => AuthMiddleware::isNotAuth());
Router::add("/profile/update", "POST", fn() => $profile->update(), fn() => AuthMiddleware::isNotAuth());
Router::add("/profile/delete", "GET", fn() => $profile->delete(), fn() => AuthMiddleware::isNotAuth());


Router::add("/signup", "GET", fn() => $signup->page(), fn() => AuthMiddleware::isAuth());
Router::add("/signup", "POST", fn() => $signup->save(), fn() => AuthMiddleware::isAuth());


Router::add("/login", "GET", fn() => $auth->page(), fn() => AuthMiddleware::isAuth());
Router::add("/login", "POST", fn() => $auth->auth(), fn() => AuthMiddleware::isAuth());


Router::add("/logout", "GET", fn() => $auth->logout(), fn() => AuthMiddleware::isNotAuth());


Router::add("/create-meme", "POST", fn() => $meme->createMeme(), fn() => AuthMiddleware::isNotAuth());

Router::execute();
