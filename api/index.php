<?php
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Factory\AppFactory;
use Illuminate\Database\Capsule\Manager as DB;

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/database.php';

// Instantiate app
$app = AppFactory::create();
$app->setBasePath('/sistemaescolarv4/api');

// Add Error Handling Middleware
$app->addErrorMiddleware(true, false, false);

// Add route callbacks
$app->get('/', function (Request $request, Response $response, array $args) 
{
    $response->getBody()->write('Hello World');
    return $response;
});

$app->post('/login/{user}', function (Request $request, Response $response, array $args) 
{

    $data= json_decode($request->getBody()->getContents(), false);

    $user = DB::table('login')
    ->where('user', $args['user'])
    ->first();

    $msg = new stdClass();
    if ($user->pass == $data->password){
        $msg->aceptado = true;
        if($data->usuario == 'admin@gmail.com'){
            $msg->mensaje= true;
        }
        else{
            $msg->mensaje= false;
        }
    }
    else{
        $msg->aceptado = false;
    }

    $response->getBody()->write(json_encode($msg));
    return $response;
});

$app->post('/insertar', function (Request $request, Response $response, array $args) 
{
    $data= json_decode($request->getBody()->getContents(), false);

    DB::table('calificaciones')
    ->insert(['calificacion' => $data->calificacion]);

    $mensaje= new stdClass();

    if ($data->calificacion == ""){
        $mensaje->ins = true;
    }
    else{
        $mensaje->ins = false;
    }

    $response->getBody()->write(json_encode($mensaje));
    return $response;
});

// Run application
$app->run();

