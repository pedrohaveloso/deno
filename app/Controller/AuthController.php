<?

namespace App\Controller;

use App\Repository\UserRepository;

use App\Core\Session;
use App\Core\HTTP\HTMX;
use App\Core\HTTP\Request;
use App\Core\HTTP\View;

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
    $register_form = Request::post_data();

    if (UserRepository::get_by_email($register_form['email']) != null) {
      ?>
      <p class="text-red-500">
        <?= gettext('E-mail já cadastrado.') ?>
      </p>
      <?

      HTMX::response();
    }

    $errors = UserRepository::insert_changeset($register_form);

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

      HTMX::response();
    }

    Session::set('user', [
      'email' => $register_form['email'],
      'name' => $register_form['fullname']
    ]);

    HTMX::redirect('/home');
  }
}