<?

namespace App\Controller;

use App\Repository\UserRepository;

use App\Core\Session;
use App\Web\{Brick, Request, View};

class UserController extends Controller
{
  public function choice()
  {
    return View::render(
      'shop/user/choice',
      layout: 'shop',
    );
  }

  public function login()
  {
    return View::render(
      'shop/user/login',
      layout: 'shop',
      page_title: _('Entrar'),
    );
  }

  public function login_post()
  {
    $user = Request::post_data();

    $db_user = UserRepository::get_by_email($user['email']);

    if (
      empty($db_user)
      || password_verify($user['password'], $db_user['password']) == false
    ) {
      return Brick::render('user/login/invalid_credentials');
    }

    Session::set_user($db_user);

    return Brick::redirect('/home');
  }

  public function register()
  {
    return View::render(
      'shop/user/register',
      layout: 'shop',
      page_title: _('Registrar-se'),
    );
  }

  public function register_post()
  {
    $user = Request::post_data();

    if (UserRepository::get_by_email($user['email']) != null) {
      return Brick::render('user/register/already_exists');
    }

    $errors = UserRepository::insert_changeset($user);

    if (!empty($errors)) {
      return Brick::render('user/register/changeset_errors', errors: $errors);
    }

    UserRepository::insert($user);

    Session::set_user($user);

    return Brick::redirect('/home');
  }
}