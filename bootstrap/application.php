<?

/**
 * -----------------------------------------------------------------------------
 * Define as constantes globais utilizadas pelo projeto e inicia o fluxo direto
 * da aplicação incluindo os arquivos de rotas. Finaliza o fluxo fechando conexões.
 * 
 * -----------------------------------------------------------------------------
 * Para entender o fluxo do sistema, leia o arquivo README.md na raiz do projeto.
 * -----------------------------------------------------------------------------
 */

include __DIR__ . '/constants.php';
include __DIR__ . '/functions.php';

foreach (glob(ROUTESDIR . '/*.php') as $router_file) {
  include $router_file;
}

App\Core\Router::dispatch();
App\Core\Database::close_all();