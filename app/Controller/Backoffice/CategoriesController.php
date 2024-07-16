<?

namespace App\Controller\Backoffice;

use App\Controller\Controller;
use App\Repository\CategoryRepository;
use App\Web\Brick;
use App\Web\Request;
use App\Web\View;

class CategoriesController extends Controller
{
  public function index()
  {
    $categories = CategoryRepository::get_all(
      Request::get_data_by_key('page') ?? 1
    );

    $list_table = Brick::get(
      'categories/list_table',
      categories: $categories
    );

    if (Request::get_data_by_key('page')) {
      return Brick::render($list_table);
    }

    return View::render(
      'backoffice/categories/index',
      layout: 'backoffice',
      list_table: $list_table
    );
  }
}