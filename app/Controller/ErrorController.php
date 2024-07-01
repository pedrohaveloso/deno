<?

namespace App\Controller;

use App\Core\HTTP\View;

class ErrorController extends Controller
{
  public function not_found()
  {
    return View::render(
      'shop/error/not_found',
      layout: 'shop',
      page_title: _('Página não encontrada')
    );
  }
}