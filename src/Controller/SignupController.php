<?php

namespace App\Pinnio\Controller;

use App\Pinnio\Config\View;
use App\Pinnio\Config\Database;
use App\Pinnio\Model\SignupModel;
use App\Pinnio\Repository\UserRepository;
use App\Pinnio\Service\SignupService;
use App\Pinnio\Exception\ValidationException;

class SignupController
{
  static private SignupModel $signupModel;
  static private SignupService $signupService;

  public function __construct()
  {
    $connDB = Database::connect();
    $userRepository = new UserRepository($connDB);

    self::$signupModel = new SignupModel();
    self::$signupService = new SignupService($userRepository);
  }

  public function page(): void
  {
    View::render("signup", [
      "title" => "Sign up",
      "style" => "signup.css",
      "script" => ["signup.js"]
    ]);
  }

  public function save(): void
  {
    try {
      self::$signupModel->username = $_POST["username"];
      self::$signupModel->email = $_POST["email"];
      self::$signupModel->password = $_POST["password"];

      self::$signupService->save(self::$signupModel);
      View::redirect("/login");
    } catch (ValidationException $e) {
      View::render("signup", [
        "title" => "Sign up",
        "style" => "signup.css",
        "script" => ["signup.js"],
        "error_message" => $e->getMessage()
      ]);
    }
  }
}