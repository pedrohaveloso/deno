<?

/**
 * -----------------------------------------------------------------------------
 * Define as constantes globais utilizadas pelo projeto e inicia o fluxo direto
 * da aplicação incluindo os arquivos de rotas e utilizando da classe Application.
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

App\Core\Application::start();