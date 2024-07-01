<?

use App\Core\Router;
use App\Core\Session;
use App\Core\HTTP\Response;

Router::group(
  '/backoffice',
  routes: [
    Router::get('/', 'backoffice@index'),
  ],
);

Router::group(
  '/admin',
  routes: [
    Router::get('/login', 'admin@login'),
    Router::post('/login', 'admin@login_post'),
  ],
  guard: Router::guard(
    fn() => Session::admin_is_logged(),
    fn() => Response::redirect('/backoffice')
  )
);