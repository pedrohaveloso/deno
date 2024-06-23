<?

use App\Core\Router;
use App\Core\Session;
use App\Core\HTTP\Response;

Router::group('/', routes: [
  Router::get('/contact', 'home@contact')
]);

Router::group(
  '/auth',
  routes: [
    Router::get('/choice', 'auth@choice'),

    Router::get('/login', 'auth@login'),
    Router::post('/login', 'auth@login_post'),

    Router::get('/register', 'auth@register'),
    Router::post('/register', 'auth@register_post'),
  ],
  guard: Router::guard(
    fn() => Session::user_is_logged(),
    fn() => Response::redirect('/')
  )
);
