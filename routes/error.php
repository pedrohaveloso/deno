<?

use App\Core\Router as r;

r::on(404, 'error@not_found');