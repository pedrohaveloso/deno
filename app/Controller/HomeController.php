<?

namespace App\Controller;

use App\Core\HTTP\View;

class HomeController extends Controller
{
  public function index()
  {
    return View::render(
      'shop/home/index',
      layout: 'shop',
      current_page: 'home',
      page_title: _('Início')
    );
  }

  public function contact()
  {
    $topics = [
      ['title' => 'Dúvidas gerais', 'slug' => '/'],
      ['title' => 'Atendimento técnico', 'slug' => '/'],
      ['title' => 'Meus pedidos', 'slug' => '/'],
      ['title' => 'Produtos', 'slug' => '/'],
      ['title' => 'Quero ser revenda ou aturizada', 'slug' => '/'],
      ['title' => 'Instruções de compra', 'slug' => '/'],
    ];

    $questions = [
      ['title' => 'Como acompanhar e rastrear meu pedido.', 'slug' => '/'],
      ['title' => 'Como ter acesso à assistência técnica Deno?', 'slug' => '/'],
      ['title' => 'Ao comprar na Loja Online, a montagem do equipamento está inclusa?', 'slug' => '/'],
    ];

    return View::render(
      'shop/home/contact',
      layout: 'shop',
      current_page: 'contact',
      page_title: _('Atendimento'),
      topics: $topics,
      questions: $questions
    );
  }
}