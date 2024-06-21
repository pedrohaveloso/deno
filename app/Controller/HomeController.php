<?

namespace App\Controller;

use App\Core\HTTP\View;

class HomeController extends Controller
{
  public function index()
  {
    View::render('shop/home/index', layout: 'shop', current_page: 'home');
  }
}