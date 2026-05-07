<?php

namespace App\Pinnio\Controller;

use App\Pinnio\Config\View;
use App\Pinnio\Config\Database;
use App\Pinnio\Model\AuthModel;
use App\Pinnio\Repository\UserRepository;
use App\Pinnio\Service\AuthService;
use App\Pinnio\Exception\ValidationException;

class AuthController
{
  private static AuthModel $authModel;
  private static AuthService $authService;

  public function __construct()
  {
    $connDB = Database::connect();
    $userRepository = new UserRepository($connDB);

    self::$authModel = new AuthModel();
    self::$authService = new AuthService($userRepository);
  }

  public function page(): void
  {
    View::render("login", [
      "title" => "Log in",
      "style" => "login.css",
      "script" => "login.js"
    ]);
  }

  public function auth(): void
  {
    try {
      self::$authModel->username = $_POST["username"];
      self::$authModel->password = $_POST["password"];

      self::$authService->auth(self::$authModel);
      View::redirect("/home");
    } catch (ValidationException $e) {
      View::render("login", [
        "title" => "Log in",
        "style" => "login.css",
        "script" => "login.js",
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function logout(): void
  {
    session_destroy();
    session_unset();
    View::redirect("/login");
  }
}