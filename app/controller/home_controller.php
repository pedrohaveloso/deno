<?php

namespace App\Controller;

class HomeController extends Controller
{
  public function index()
  {
    view('shop/home/index', layout: 'shop', current_page: 'home');
  }
}