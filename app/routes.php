<?php
declare(strict_types=1);

use App\Application\Actions\User\ListUsersAction;
use App\Application\Actions\User\ViewUserAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {

    $serviceName = "Testkinkan";

    $app->get('/board/signup', function (Request $request, Response $response) {
        $response->getBody()->write('店長側:新規作成画面');
        return $response;
    });

    $app->get('/board/login', function (Request $request, Response $response) {
        $response->getBody()->write('店長側：ログイン画面');
        return $response;
    });

    $app->get('/board/dashboard', function (Request $request, Response $response) {
        $response->getBody()->write('店長側：トップページ');
        return $response;
    });

    $app->get('/board/employees', function (Request $request, Response $response) {
        $response->getBody()->write('店長側：従業員一覧画面');
        return $response;
    });

    $app->get('/board/process', function (Request $request, Response $response) {
        $response->getBody()->write('店長側：月末処理：開発中');
        return $response;
    });

    $app->get('/board/system-settings', function (Request $request, Response $response) {
        $response->getBody()->write('店長側：システム設定');
        return $response;
    });

    // サンプルURL
    $app->group('/users', function (Group $group) {
        $group->get('', ListUsersAction::class);
        $group->get('/{id}', ViewUserAction::class);
    });
};
