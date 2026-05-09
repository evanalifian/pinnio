<?php

namespace App\Pinnio\Repository;

use App\Pinnio\Model\MemeModel;

class MemeRepository
{
    static private \PDO $connDB;

    public function __construct(\PDO $connDB)
    {
        self::$connDB = $connDB;
    }

    public function saveMeme(MemeModel $memeModel): bool
    {
        $query = "INSERT INTO memes (user_id, image_url, caption) VALUES (?, ?, ?)";
        $stmt = self::$connDB->prepare($query);
        return $stmt->execute([$memeModel->user_id, $memeModel->image_path, $memeModel->caption]);
    }

    public function getMemes(?int $user_id = null): array
    {
        $statement = self::$connDB->prepare("CALL get_memes(?)");
        $statement->execute([$user_id]);
        return $statement->fetchAll(\PDO::FETCH_ASSOC);
    }
}
