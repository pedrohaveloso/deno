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

foreach (glob(ROUTESDIR . '/*.php') as $router_file) {
  include $router_file;
}

App\Core\Application::start();