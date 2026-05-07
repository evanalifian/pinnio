<?php

namespace App\Pinnio\Controller;

use App\Pinnio\Config\Database;
use App\Pinnio\Config\View;
use App\Pinnio\Exception\ValidationException;
use App\Pinnio\Model\UserModel;
use App\Pinnio\Repository\UserRepository;
use App\Pinnio\Service\UserService;

class ProfileController
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

  public function page(): void
  {
    View::app("account", [
      "title" => "Profil — PinThread",
      "style" => "profile.css",
      "script" => "profile.js"
    ]);
  }

  public function update(): void
  {
    try {
      self::$userModel->name = $_POST["name"];
      self::$userModel->username = $_POST["username"];

      self::$userService->update(self::$userModel, $_SESSION['auth']["id"]);
      View::redirect("/account");
    } catch (ValidationException $e) {
      View::render("account", [
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function delete(): void
  {
    try {
      self::$userService->delete($_SESSION['auth']["id"]);
      View::redirect("/");
    } catch (ValidationException $e) {
      View::render("account", [
        "error_message" => $e->getMessage()
      ]);
    }
  }
}