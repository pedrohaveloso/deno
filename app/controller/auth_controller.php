<?php

namespace App\Controller;

use App\Utils\HTMX;
use App\Utils\View;

class AuthController extends Controller
{
  public function choice()
  {
    View::render('shop/auth/choice', layout: 'shop');
  }

  public function login()
  {
    View::render('shop/auth/login', layout: 'shop');
  }

  public function login_post()
  {
    HTMX::redirect('/home');
  }

  public function register()
  {
    View::render('shop/auth/register', layout: 'shop');
  }

  public function register_post()
  {
    HTMX::redirect('/home');
  }
}