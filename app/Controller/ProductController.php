<?

namespace App\Controller;

use App\Web\View;

class ProductController extends Controller
{
  public function index()
  {
    return View::render(
      'shop/products/index',
      layout: 'shop',
      current_page: 'products',
      page_title: _('Produtos'),
    );
  }
}