<?

/**
 * -----------------------------------------------------------------------------
 * Realiza a conexão com os bancos de dados configurados no arquivo: 
 * CONFIGDIR/databases.php. A conexão é feita utilizando o PDO (PostgreSQL).
 * -----------------------------------------------------------------------------
 */

namespace App\Core;

use Exception;
use PDO;

class Database
{
  /**
   * @var PDO[]|null
   */
  private static ?array $connections = [];

  /**
   * @var array 
   */
  private static ?array $databases_configs = [];

  public static function get(string $name = null): PDO
  {
    if ($name === null) {
      $name = 'default';
    }

    if (!empty(self::$connections[$name])) {
      return self::$connections[$name];
    }

    if (empty(self::$databases_configs)) {
      $databases_config_file = CONFIGDIR . '/databases.php';

      if (!file_exists($databases_config_file . '/databases.php') === false) {
        throw new Exception('Arquivo de configuração de banco de dados inexistente.');
      }

      self::$databases_configs = include $databases_config_file;

      if (!is_array(self::$databases_configs)) {
        throw new Exception('Erro ao incluir o arquivo de configuração.');
      }
    }

    if (empty(self::$databases_configs[$name])) {
      throw new Exception('Conexão inexistente no arquivo.');
    }

    $configs = self::$databases_configs[$name];

    self::$connections[$name] = new PDO(
      'pgsql:host='
      . $configs['host']
      . ';port='
      . $configs['port']
      . ';dbname='
      . $configs['database_name']
      . ';',
      $configs['username'],
      $configs['password'],
      [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    return self::$connections[$name];
  }

  public static function close(string $name = 'default'): void
  {
    self::$connections[$name] = null;
  }

  public static function close_all(): void
  {
    self::$connections = null;
  }

  public static function timestamp(): string
  {
    return <<<SQL
      "created_at" TIMESTAMP DEFAULT NOW(),
      "updated_at" TIMESTAMP DEFAULT NOW()
    SQL;
  }
}
