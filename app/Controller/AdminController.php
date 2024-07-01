<?

namespace App\Controller;

use App\Core\HTTP\HTMX;
use App\Core\HTTP\Request;
use App\Core\HTTP\View;
use App\Core\Session;
use App\Repository\AdminRepository;

class AdminController extends Controller
{
  public function login()
  {
    return View::render('backoffice/admin/login');
  }

  public function login_post()
  {
    $admin = Request::post_data();

    $db_admin = AdminRepository::get_by_username($admin['username']);

    if (
      empty($db_admin)
      || password_verify($admin['password'], $db_admin['password']) == false
    ) {
      ?>
      <p class="text-error text-center">
        <?= _('Nome de usuário ou senha inválido(s).') ?>
      </p>
      <?

      return HTMX::response();
    }

    Session::set_admin($db_admin);

    return HTMX::redirect('/backoffice');
  }
}