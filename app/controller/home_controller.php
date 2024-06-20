<?php

namespace App\Controller;

use App\Utils\View;

class HomeController extends Controller
{
  public function index()
  {
    View::render('shop/home/index', layout: 'shop', current_page: 'home');
  }
}