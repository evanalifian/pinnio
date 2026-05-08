<?php

namespace App\Pinnio\Controller;

use App\Pinnio\Config\Database;
use App\Pinnio\Config\View;
use App\Pinnio\Model\UserModel;
use App\Pinnio\Repository\UserRepository;
use App\Pinnio\Service\UserService;

class HomeController
{
  private static UserModel $userModel;
  private static UserService $userService;

  public function __construct()
  {
    $connDB = Database::connect();
    $userRepository = new UserRepository($connDB);

    self::$userModel = new UserModel();
    self::$userService = new UserService($userRepository);
  }

  public function landing(): void
  {
    View::render("landing", [
      "title" => "PinThread — Say it. Thread it.",
      "style" => "landing.css"
    ]);
  }

  public function home(): void
  {
    $user = self::$userService->getUserById($_SESSION['auth']["user_id"]);
    View::app("home", [
      "title" => "Home — PinThread",
      "user" => $user
    ]);
  }
}