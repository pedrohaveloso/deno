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

if (file_exists(__DIR__ . '/../priv/config/local.php')) {
  include __DIR__ . '/../priv/config/local.php';
} else {
  include __DIR__ . '/../priv/config/local.default.php';
}

include __DIR__ . '/constants.php';
include __DIR__ . '/functions.php';

$router_files = glob(ROUTESDIR . '/*.php');

foreach ($router_files as $router_file) {
  /** @var App\Core\Router */
  ($router = include $router_file)->routes();
}

App\Core\Router::dispatch();
App\Core\Database::close_all();
