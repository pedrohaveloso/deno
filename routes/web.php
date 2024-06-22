<?

use App\Core\Router as r;
use App\Core\Session;

r::group(
  '/auth',
  [
    r::get('/choice', 'auth@choice'),

    r::get('/login', 'auth@login'),
    r::post('/login', 'auth@login_post'),

    r::get('/register', 'auth@register'),
    r::post('/register', 'auth@register_post'),
  ],
  r::guard(fn() => !empty (Session::get('user')), fn() => header('Location: /'))
);
