<?

namespace App\Controller;

use App\Core\HTTP\View;

class AdminController extends Controller
{
  public function login()
  {
    return View::render('backoffice/admin/login');
  }
}