<?

use App\Core\{Router, Session};
use App\Web\Response;

return new class extends Router {
  public function routes(): void
  {
    self::get('/', fn() => Response::redirect('/home'));

    /** @todo REMOVE: */
    self::get('/destroy', fn() => Session::destroy() && Response::redirect('/'));

    self::get('/home', 'home@index');
    self::get('/contact', 'home@contact');
    self::get('/products', 'product@index');

    self::guard_start(
      'user_is_logged',
      fn() => Session::user_is_logged(),
      fn() => Response::redirect('/user/choice')
    );

    self::get('/profile', 'user@profile');

    self::guard_end('user_is_logged');

    self::guard_start(
      'user_not_is_logged',
      fn() => !Session::user_is_logged(),
      fn() => Response::redirect('/')
    );

    self::get('/user/choice', 'user@choice');

    self::get('/user/login', 'user@login');
    self::post('/user/login', 'user@login_post');

    self::get('/user/register', 'user@register');
    self::post('/user/register', 'user@register_post');

    self::guard_end('/user_not_is_logged');
  }
};
