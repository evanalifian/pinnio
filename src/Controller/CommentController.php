<?php

namespace App\Pinnio\Controller;

use App\Pinnio\Config\Database;
use App\Pinnio\Config\View;
use App\Pinnio\Exception\ValidationException;
use App\Pinnio\Model\CommentModel;
use App\Pinnio\Repository\CommentRepository;
use App\Pinnio\Service\CommentService;

class CommentController
{
  private static CommentService $commentService;
  private static CommentModel $commentModel;
  
  public function __construct()
  {
    $connDB = Database::connect();
    $commentRepository = new CommentRepository($connDB);

    self::$commentService = new CommentService($commentRepository);
    self::$commentModel = new CommentModel();
  }

  public function saveComment($meme_id): void
  {
    try {
      self::$commentModel->user_id = $_SESSION["auth"]["user_id"];
      self::$commentModel->meme_id = $meme_id;
      self::$commentModel->content = $_POST["content"];

      var_dump(self::$commentModel);
  
      self::$commentService->saveComment(self::$commentModel);
      View::redirect("/meme/$meme_id");
    } catch (ValidationException $e) {
      View::redirect("/meme/$meme_id");
    }
  }
}