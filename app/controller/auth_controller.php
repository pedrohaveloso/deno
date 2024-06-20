<?php

namespace App\Controller;

class AuthController extends Controller
{
  public function choice()
  {
    view('shop/auth/choice', layout: 'shop');
  }

  public function login()
  {
    view('shop/auth/login', layout: 'shop');
  }

  public function register()
  {
    view('shop/auth/register', layout: 'shop');
  }
}