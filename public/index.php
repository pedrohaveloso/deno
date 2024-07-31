<?

/**
 * -----------------------------------------------------------------------------
 * Todas as requisições feitas ao servidor NGINX são direcionadas para esse
 * arquivo, ele inclui o autoload do Composer e o arquivo application.php,
 * responsável por iniciar a aplicação.
 * -----------------------------------------------------------------------------
 */

include __DIR__ . '/../priv/vendor/autoload.php';

include __DIR__ . '/../bootstrap/application.php';  