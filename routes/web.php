<?

use App\Core\Router;
use App\Core\Session;
use App\Core\HTTP\Response;

Router::on(404, 'error@not_found');

Router::group(
  '/',
  routes: [
    Router::get('/', fn() => Response::redirect('/home')),
    Router::get('/destroy', fn() => Session::destroy()),

    Router::get('/home', 'home@index'),
    Router::get('/contact', 'home@contact'),
    Router::get('/products', 'products@index')
  ]
);

Router::group(
  '/',
  routes: [
    Router::get('/profile', 'user@profile'),
  ],
  guard: Router::guard(
    fn() => !Session::user_is_logged(),
    fn() => Response::redirect('/user/choice')
  )
);

Router::group(
  '/user',
  routes: [
    Router::get('/choice', 'user@choice'),

    Router::get('/login', 'user@login'),
    Router::post('/login', 'user@login_post'),

    Router::get('/register', 'user@register'),
    Router::post('/register', 'user@register_post'),
  ],
  guard: Router::guard(
    fn() => Session::user_is_logged(),
    fn() => Response::redirect('/')
  )
);

Router::group(
  '/backoffice',
  routes: [
  ],
);

Router::group(
  '/admin',
  routes: [
    Router::get('/login', 'admin@login'),
    Router::post('/login', 'admin@login_post'),
  ]
);