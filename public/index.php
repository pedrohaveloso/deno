<?

/**
 * -----------------------------------------------------------------------------
 * Todas as requisições feitas ao servidor NGINX são direcionadas para esse
 * arquivo, ele inclui o autoload do Composer e o arquivo application.php,
 * responsável por iniciar a aplicação.
 * 
 * -----------------------------------------------------------------------------
 * Para entender o fluxo do sistema, leia o arquivo README.md na raiz do projeto.
 * -----------------------------------------------------------------------------
 */

include __DIR__ . '/../priv/vendor/autoload.php';

include __DIR__ . '/../bootstrap/application.php';