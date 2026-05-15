<?php

namespace App\Pinnio\Service;

use App\Pinnio\Exception\ValidationException;
use App\Pinnio\Model\UserModel;
use App\Pinnio\Repository\UserRepository;

class UserService
{
  private static UserRepository $userRepository;

  public function __construct(UserRepository $userRepository)
  {
    self::$userRepository = $userRepository;
  }

  public function getUserById(int $userID): array
  {
    $result = self::$userRepository->findByID($userID)->fetch();

    if (!$result) {
      throw new ValidationException("User does not match");
    }

    return $result;
  }

  public function getUserByUsername(string $username): array
  {
    $result = self::$userRepository->findByUsername($username)->fetch();

    if (!$result) {
      throw new ValidationException("User does not match");
    }

    return $result;
  }

  public function update(UserModel $userModel, int $userID): void
  {
    $model = $userModel;

    self::updateValidation($model);

    $result = self::$userRepository->findByID($userID)->fetch();

    if (!$result) {
      throw new ValidationException("User does not match");
    }

    self::$userRepository->update($model, $userID);

    $_SESSION["auth"] = [
      "user_id" => $result["user_id"],
      "email" => $result["email"]
    ];
  }

  private static function updateValidation(UserModel $userModel): void
  {
    if (empty($userModel->username)) {
      throw new ValidationException("Username tidak boleh kosong");
    }
  }

  public function delete(int $userID): void
  {
    self::$userRepository->delete($userID);
    session_destroy();
    session_unset();
  }
}