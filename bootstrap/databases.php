<?

/**
 * -----------------------------------------------------------------------------
 * Realiza a conexão com todos os banco de dados configurados no arquivo: 
 * CONFIGDIR/databases.json. A conexão é feita utilizando o PDO (PostgreSQL),
 * sendo armazenadas como variáveis globais dentro de ['___dbs___'][$connection_name].
 * -----------------------------------------------------------------------------
 */

const DATABASES_CONFIG_FILE = CONFIGDIR . '/databases.json';

if (!file_exists(DATABASES_CONFIG_FILE . '/databases.json') === false) {
  throw new Exception('Arquivo de configuração de banco de dados inexistente.');
}

$databases_config_file_content = file_get_contents(DATABASES_CONFIG_FILE);

if (is_bool($databases_config_file_content)) {
  throw new Exception('Erro ao ler o arquivo de configuração de banco de dados.');
}

$databases_configs = json_decode($databases_config_file_content, true);

if (!is_array($databases_configs)) {
  throw new Exception('Erro ao decodificar o arquivo de configuração no formato JSON.');
}

$dbs = array_map(
  function ($configs) {
    return [
      $configs['connection_name'] => new PDO(
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
      )
    ];
  },
  $databases_configs,
);

/**
 * @var PDO[]
 */
$merged_dbs = array_merge(...$dbs);

$GLOBALS['___dbs___'] = $merged_dbs;