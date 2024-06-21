<?

use App\Core\Router;

Router::get('/', fn() => 'Hello');

Router::group(
  '/profile',
  [
    Router::get('/me', fn() => 'Hello'),
    Router::get('/others', fn() => 'Hello'),
  ]
);

Router::group(
  '/auth',
  [
    Router::get('/choice', fn() => 'Hello'),

    Router::get('/login', fn() => 'Hello'),
    Router::post('/login', fn() => 'Hello'),

    Router::get('/register', fn() => 'Hello'),
    Router::post('/register', fn() => 'Hello'),
  ],
  Router::guard([true, true, false], function () { // Clausula guarda de exemplo.
    header('Location: /');
    exit;
  })
);

Router::dispatch();

// var_dump(Router::$routes);
