<?

namespace App\Controller;

use App\Repository\UserRepository;

use App\Core\Session;
use App\Core\HTTP\{HTMX, Request, View};

class AuthController extends Controller
{
  public function choice()
  {
    return View::render('shop/auth/choice', layout: 'shop');
  }

  public function login()
  {
    return View::render('shop/auth/login', layout: 'shop');
  }

  public function login_post()
  {
    $user = Request::post_data();

    $db_user = UserRepository::get_by_email($user['email']);

    if (
      empty($db_user)
      || password_verify($user['password'], $db_user['password']) == false
    ) {
      ?>
      <p class="text-red-500">
        <?= _('E-mail ou senha inválido(s).') ?>
      </p>
      <?

      return HTMX::response();
    }

    Session::set_user($db_user);

    return HTMX::redirect('/home');
  }

  public function register()
  {
    return View::render('shop/auth/register', layout: 'shop');
  }

  public function register_post()
  {
    $user = Request::post_data();

    if (UserRepository::get_by_email($user['email']) != null) {
      ?>
      <p class="text-red-500">
        <?= _('E-mail já cadastrado.') ?>
      </p>
      <?

      return HTMX::response();
    }

    $errors = UserRepository::insert_changeset($user);

    if (!empty($errors)) {
      ?>
      <p class="text-red-500">
        <?
        echo join(array_map(function ($error) {
          return $error . '<br />';
        }, $errors));
        ?>
      </p>
      <?

      return HTMX::response();
    }

    UserRepository::insert($user);

    Session::set_user($user);

    return HTMX::redirect('/home');
  }
}