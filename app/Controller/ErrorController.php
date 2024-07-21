<?

namespace App\Controller;

use App\Web\Request;
use App\Web\View;

class ErrorController extends Controller
{
  public function not_found()
  {
    $origin_is_backoffice = explode(
      '/',
      parse_url(Request::origin_url(), PHP_URL_PATH),
    )[1] ?? '' === 'backoffice';

    if ($origin_is_backoffice) {
      return View::render(
        'backoffice/error/not_found',
        layout: 'backoffice',
        page_title: _('Página não encontrada')
      );
    }

    return View::render(
      'shop/error/not_found',
      layout: 'shop',
      page_title: _('Página não encontrada')
    );
  }
}