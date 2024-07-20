<?

namespace App\Controller\Backoffice;

use App\Controller\Controller;
use App\Web\Brick;
use App\Web\Paginator;
use App\Web\Request;
use App\Web\View;

class CategoryController extends Controller
{
  public function index()
  {
    $filter = Request::get_data_by_key('filter');

    $query = \App\Repo\Category::get_all_query(
      $filter['name'] ?? null,
      $filter['description'] ?? null,
    );

    $paginator = Paginator::from_query($query);

    $paginator_brick = Brick::get(
      'category/list_paginator',
      paginator: $paginator
    );

    if (Request::is_pagination()) {
      return Brick::render($paginator_brick);
    }

    return View::render(
      'backoffice/category/index',
      layout: 'backoffice',
      paginator_brick: $paginator_brick,
    );
  }

  public function manage()
  {
    
  }
}