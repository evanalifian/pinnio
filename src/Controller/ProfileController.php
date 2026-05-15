<?php

namespace App\Pinnio\Controller;

use App\Pinnio\Config\Database;
use App\Pinnio\Config\View;
use App\Pinnio\Exception\ValidationException;
use App\Pinnio\Model\UserModel;
use App\Pinnio\Repository\MemeRepository;
use App\Pinnio\Repository\UserRepository;
use App\Pinnio\Service\MemeService;
use App\Pinnio\Service\UserService;

class ProfileController
{
  private static UserModel $userModel;
  private static UserService $userService;
  private static MemeService $memeService;

  public function __construct()
  {
    $connDB = Database::connect();
    $userRepository = new UserRepository($connDB);
    $memeRepository = new MemeRepository($connDB);

    self::$userModel = new UserModel();
    self::$userService = new UserService($userRepository);
    self::$memeService = new MemeService($memeRepository);
  }

  public function page(): void
  {
    $user = self::$userService->getUserById($_SESSION['auth']["user_id"]);
    $memes = self::$memeService->getMemes($_SESSION['auth']["user_id"]);
    
    View::app("profile", [
      "title" => "Profil — PinThread",
      "style" => "profile.css",
      "script" => ["profile.js"],
      "user" => $user,
      "memes" => $memes
    ]);
  }

  // File: ProfileController.php

  public function update(): void
  {
    $user = self::$userService->getUserById($_SESSION['auth']["user_id"]);
    $memes = self::$memeService->getMemes($_SESSION['auth']["user_id"]);

    try {
      self::$userModel->name = $_POST["name"] ?? null; // Gunakan null coalescing
      self::$userModel->bio = $_POST["bio"] ?? null;

      self::$userService->update(self::$userModel, $_SESSION['auth']["user_id"]);
      View::redirect("/profile");
    } catch (ValidationException $e) {
      // PERBAIKAN: Gunakan View::app, bukan View::render
      View::app("profile", [
        "title" => "Profil — PinThread",
        "style" => "profile.css",
        "script" => ["profile.js"],
        "user" => $user,
        "memes" => $memes,
        "error_message" => $e->getMessage()
      ]);
    }
  }

  public function delete(): void
  {
    $user = self::$userService->getUserById($_SESSION['auth']["user_id"]);
    $memes = self::$memeService->getMemes($_SESSION['auth']["user_id"]);
    
    try {
      self::$userService->delete($_SESSION['auth']["user_id"]);
      View::redirect("/");
    } catch (ValidationException $e) {
      View::render("profile", [
        "title" => "Profil — PinThread",
        "style" => "profile.css",
        "script" => ["profile.js"],
        "user" => $user,
        "memes" => $memes,
        "error_message" => $e->getMessage()
      ]);
    }
  }
}
