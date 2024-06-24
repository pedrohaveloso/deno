<?

/**
 * -----------------------------------------------------------------------------
 * Realiza a conexão com os bancos de dados configurados no arquivo: 
 * CONFIGDIR/databases.json. A conexão é feita utilizando o PDO (PostgreSQL).
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

  public static function get(string $name = null): PDO
  {
    if ($name === null) {
      $name = 'default';
    }

    if (!empty(self::$connections[$name])) {
      return self::$connections[$name];
    }

    $databases_config_file = CONFIGDIR . '/databases.json';

    if (!file_exists($databases_config_file . '/databases.json') === false) {
      throw new Exception('Arquivo de configuração de banco de dados inexistente.');
    }

    $databases_config_file_content = file_get_contents($databases_config_file);

    if (is_bool($databases_config_file_content)) {
      throw new Exception('Erro ao ler o arquivo de configuração de banco de dados.');
    }

    $databases_configs = json_decode($databases_config_file_content, true);

    if (!is_array($databases_configs)) {
      throw new Exception('Erro ao decodificar o arquivo de configuração no formato JSON.');
    }

    if (empty($databases_configs[$name])) {
      throw new Exception('Conexão inexistente no arquivo.');
    }

    $configs = $databases_configs[$name];

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
