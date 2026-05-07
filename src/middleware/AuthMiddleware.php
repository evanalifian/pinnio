<?php

namespace App\Pinnio\Middleware;

use App\Pinnio\Config\View;

class AuthMiddleware
{
  public static function isAuth(): void
  {
    session_start();

    if (isset($_SESSION["auth"])) {
      View::redirect("/home");
    }
  }

  public static function isNotAuth(): void
  {
    session_start();

    if (!isset($_SESSION["auth"])) {
      View::redirect("/login");
    }
  }
}