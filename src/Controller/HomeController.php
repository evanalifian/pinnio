<?php

namespace App\Pinnio\Controller;

use App\Pinnio\Config\View;

class HomeController
{
  public function index(): void
  {
    View::render("index");
  }
}