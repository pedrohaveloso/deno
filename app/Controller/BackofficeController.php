<?

namespace App\Controller;

use App\Core\HTTP\View;

class BackofficeController extends Controller
{
  public function index()
  {
    return View::render('backoffice/index');
  }
}