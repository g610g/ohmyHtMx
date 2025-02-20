<?p

use App\Route;

$router = new Route($_SERVER);

$router->get('/count', function () {
    echo 'Deez nuts';
});

$router->post('/count', function () {
    echo 'posting for count';
});

$router->execute();
