<?

use App\Core\Router;

/**
 * -----------------------------------------------------------------------------
 * Define as constantes globais utilizadas pelo projeto e inicia o fluxo direto
 * da aplicação incluindo os arquivos de rotas. Finaliza o fluxo fechando conexões.
 * 
 * -----------------------------------------------------------------------------
 * Para entender o fluxo do sistema, leia o arquivo README.md na raiz do projeto.
 * -----------------------------------------------------------------------------
 */

const PROJECTDIR = __DIR__ . '/../';
const BOOTSTRAPDIR = __DIR__;

const TEMPLATESDIR = __DIR__ . '/../templates/';
const VIEWSDIR = TEMPLATESDIR . '/views/';
const COMPONENTSDIR = TEMPLATESDIR . '/components/';
const LAYOUTSDIR = TEMPLATESDIR . '/layouts/';

const ROUTESDIR = __DIR__ . '/../routes/';
const CONFIGDIR = __DIR__ . '/../priv/config/';

include_once BOOTSTRAPDIR . '/databases.php';

foreach (glob(ROUTESDIR . '/*.php') as $router_file) {
  include $router_file;
}

Router::dispatch();

$GLOBALS['___dbs___'] = null;