<?php

namespace App\Pinnio\Controller;

use App\Pinnio\Config\View;

class HomeController
{
  public function landing(): void
  {
    View::render("landing", [
      "title" => "PinThread — Say it. Thread it.",
      "style" => "landing.css"
    ]);
  }

  public function home(): void
  {
    View::app("home", [
      "title" => "Home — PinThread"
    ]);
  }
}