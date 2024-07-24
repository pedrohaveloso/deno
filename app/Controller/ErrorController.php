<?

namespace App\Controller;

use App\Web\Request;
use App\Web\View;

class ErrorController extends Controller
{
  public function not_found()
  {
    $origin_path = parse_url(Request::origin_url(), PHP_URL_PATH);
    $origin_root = explode('/', $origin_path)[0] ?? '';

    $origin_is_backoffice = $origin_root === 'backoffice';

    if ($origin_is_backoffice) {
      return View::render(
        'backoffice/error/not_found',
        layout: 'backoffice',
        page_title: _('Página não encontrada')
      );
    } else {
      return View::render(
        'shop/error/not_found',
        layout: 'shop',
        page_title: _('Página não encontrada')
      );
    }
  }
}