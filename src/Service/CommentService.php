<?php

namespace App\Pinnio\Service;

use App\Pinnio\Model\CommentModel;
use App\Pinnio\Repository\CommentRepository;

class CommentService
{
  private static CommentRepository $commentRepository;

  public function __construct(CommentRepository $commentRepository)
  {
    self::$commentRepository = $commentRepository;
  }

  public function saveComment(CommentModel $commentModel): bool
  {
    return self::$commentRepository->saveComment($commentModel);
  }

  public function getCommentsByMemeId(int $meme_id): array
  {
    return self::$commentRepository->getCommentsByMemeId($meme_id);
  }
}