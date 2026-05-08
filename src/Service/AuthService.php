<?php

namespace App\Pinnio\Service;

use App\Pinnio\Model\AuthModel;
use App\Pinnio\Repository\UserRepository;
use App\Pinnio\Exception\ValidationException;

class AuthService
{
  private static UserRepository $userRepository;

  public function __construct(UserRepository $userRepository)
  {
    self::$userRepository = $userRepository;
  }

  public function auth(AuthModel $authModel): void
  {
    $model = $authModel;

    self::authValidation($model);

    $result = self::$userRepository->findByUsername($model->username)->fetch();

    if (!$result) {
      throw new ValidationException("Username does not exist");
    }

    if (!password_verify($model->password, $result["password"])) {
      throw new ValidationException("Password incorrect");
    }

    $_SESSION["auth"] = [
      "user_id" => $result["user_id"],
      "email" => $result["email"]
    ];
  }

  private static function authValidation(AuthModel $authModel): void
  {
    if (strlen($authModel->username) === 0 || strlen($authModel->password) === 0) {
      throw new ValidationException("Username and Password can noT be empty");
    }
  }
}