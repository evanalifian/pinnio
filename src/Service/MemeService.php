<?php

namespace App\Pinnio\Service;

use App\Pinnio\Model\MemeModel;
use App\Pinnio\Repository\MemeRepository;

class MemeService {
    private static MemeRepository $memeRepository;

    public function __construct(MemeRepository $memeRepository)
    {
        self::$memeRepository = $memeRepository;
    }

    public function createMeme(MemeModel $memeModel, string $file_tmp, string $file_name): bool
    {
        if (!empty($file_tmp)) {
            move_uploaded_file($file_tmp, __DIR__ . "/../../public/uploads/meme_img/" . $file_name);
        } else {
            $memeModel->image_path = null;
        }
        
        return self::$memeRepository->saveMeme($memeModel);
    }

    public function getMemes(?int $user_id = null): array
    {
        return self::$memeRepository->getMemes($user_id);
    }
}
