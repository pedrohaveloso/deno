<?

use App\Core\{Router, Session};
use App\Web\Response;

return new class extends Router {
  public function routes(): void
  {
    self::guard_start(
      'admin_is_logged',
      fn() => Session::admin_is_logged(),
      fn() => Response::redirect('/admin/login')
    );

    self::get('/backoffice', 'backoffice@index');
    self::get('/backoffice/categories', 'backoffice/category@index');

    self::get('/backoffice/products', 'backoffice/product@index');
    self::get('/backoffice/products/{product_id}', 'backoffice/product@manage');

    self::get('/admin/logoff', 'admin@logoff');

    self::guard_end('admin_is_logged');

    self::guard_start(
      'admin_is_not_logged',
      fn() => !Session::admin_is_logged(),
      fn() => Response::redirect('/backoffice')
    );

    self::get('/admin/login', 'admin@login');
    self::post('/admin/login', 'admin@login_post');

    self::guard_end('admin_is_not_logged');
  }
};