<?

namespace App\Controller;

use App\Web\View;

class BackofficeController extends Controller
{
  public function index()
  {
    return View::render(
      'backoffice/index',
      layout: 'backoffice'
    );
  }
}