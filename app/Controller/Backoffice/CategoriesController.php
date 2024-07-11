<?

namespace App\Controller\Backoffice;

use App\Controller\Controller;
use App\Web\Brick;
use App\Web\View;

class CategoriesController extends Controller
{
  public function index()
  {
    $list_table = Brick::get(
      'categories/list_table',
      categories: $categories
    );

    return View::render(
      'backoffice/categories/index',
      layout: 'backoffice',
      list_table: $list_table
    );
  }
}