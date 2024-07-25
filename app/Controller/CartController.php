<?

namespace App\Controller;

use App\Web\View;

class CartController extends Controller
{
  public function index()
  {
    return View::render('shop/cart/index', layout: 'shop');
  }
}