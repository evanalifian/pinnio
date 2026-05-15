<?php

namespace App\Pinnio\Controller;

use App\Pinnio\Config\Database;
use App\Pinnio\Config\View;
use App\Pinnio\Exception\ValidationException;
use App\Pinnio\Model\MemeModel;
use App\Pinnio\Repository\MemeRepository;
use App\Pinnio\Repository\UserRepository;
use App\Pinnio\Service\MemeService;
use App\Pinnio\Service\UserService;

class MemeController
{
    private static MemeService $memeService;
    private static UserService $userService;
    private static MemeModel $memeModel;

    public function __construct()
    {
        $connDB = Database::connect();
        $memeRepository = new MemeRepository($connDB);
        $userRepository = new UserRepository($connDB);

        self::$memeModel = new MemeModel();
        self::$memeService = new MemeService($memeRepository);
        self::$userService = new UserService($userRepository);
    }

    public function createMeme(): void
    {
        try {
            self::$memeModel->user_id = $_SESSION["auth"]["user_id"];
            self::$memeModel->image_path = "/public/uploads/meme_img/" . $_FILES["meme_img"]["name"];
            self::$memeModel->caption = $_POST["caption"] ?? null;

            self::$memeService->createMeme(self::$memeModel, $_FILES["meme_img"]["tmp_name"], $_FILES["meme_img"]["name"]);
            View::redirect("/home");
        } catch (ValidationException $e) {
            View::redirect("/home");
        }
    }

    public function viewMeme(int $meme_id): void
    {
        $meme = self::$memeService->getMemeById($meme_id);
        $user = self::$userService->getUserById($_SESSION['auth']["user_id"]);
        View::app("view_meme/view_meme", [
            "title" => "Meme — PinThread",
            "meme" => $meme,
            "user" => $user,
            "style" => "view_meme.css",
            "script" => ["view_meme.js"],
            "elements" => ["view_meme/view_meme_modal"]
        ]);
    }

    public function deleteMeme(int $meme_id): void
    {
        try {
            self::$memeService->deleteMeme($meme_id);
            View::redirect("/home");
        } catch (ValidationException $e) {
            View::redirect("/home");
        }
    }
}
