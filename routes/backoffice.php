<?

use App\Core\{Router, Session};
use App\Core\HTTP\Response;

Router::group(
  '/backoffice',
  routes: [
    Router::get('/', 'backoffice@index'),
  ],
  guard: Router::guard(
    fn() => !Session::admin_is_logged(),
    fn() => Response::redirect('/admin/login')
  )
);

Router::group(
  '/admin',
  routes: [
    Router::get('/logoff', 'admin@logoff'),
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