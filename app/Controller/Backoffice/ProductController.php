<?

namespace App\Controller\Backoffice;

use App\Controller\Controller;
use App\Web\Brick;
use App\Web\Paginator;
use App\Web\Request;
use App\Web\View;

class ProductController extends Controller
{
  public function index()
  {
    $filter = Request::get_data_by_key('filter');

    $query = \App\Repo\Product::get_all_query(
      $filter['name'] ?? null,
      $filter['description'] ?? null,
    );

    $paginator = Paginator::from_query($query);

    $paginator_brick = Brick::get(
      'product/list_paginator',
      paginator: $paginator
    );

    if (Request::is_pagination()) {
      return Brick::render($paginator_brick);
    }

    return View::render(
      'backoffice/product/index',
      layout: 'backoffice',
      paginator_brick: $paginator_brick,
    );
  }
}