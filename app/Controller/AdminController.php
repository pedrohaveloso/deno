<?

namespace App\Controller;

use App\Core\Session;
use App\Web\{Brick, Request, View, Response};

use App\Repository\AdminRepository;

class AdminController extends Controller
{
  public function login()
  {
    return View::render(
      'backoffice/admin/login',
      page_title: 'Entrar'
    );
  }

  public function login_post()
  {
    $admin = Request::post_data();

    $db_admin = AdminRepository::get_by_username($admin['username']);

    if (
      empty($db_admin)
      || password_verify($admin['password'], $db_admin['password']) == false
    ) {
      return Brick::render('admin/login/invalid_credentials');
    }

    Session::set_admin($db_admin);

    return Brick::redirect('/backoffice');
  }

  public function logoff()
  {
    Session::unset_admin();

    return Response::redirect('/backoffice');
  }
}
