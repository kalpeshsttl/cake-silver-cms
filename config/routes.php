<?php
use Cake\Cache\Cache;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;
use Cake\Routing\Route\DashedRoute;

Router::scope('/', function (RouteBuilder $routes) {
    $articleLinks = Cache::read('rewrite_rules', 'articles');
    if ($articleLinks !== false) {
        foreach ($articleLinks as $articleLink) {
            $linkOption = [
                'controller' => 'Articles',
                'action'     => 'page',
                'plugin'     => 'CakeSilverCms',
                'id'         => $articleLink['id'],
            ];
            $routes->connect('/' . $articleLink['url'], $linkOption, ['pass' => ['id']]);
        }
    }
    $routes->connect(
        '/page/:id',
        ['controller' => 'Articles', 'action' => 'page', 'plugin' => 'CakeSilverCms'],
        ['id' => '\d+', 'pass' => ['id']]
    );
});
Router::plugin(
    'CakeSilverCms',
    ['path' => '/cake-silver-cms'],
    function (RouteBuilder $routes) {
        $routes->connect('/', ['controller' => 'Dashboard', 'action' => 'index']);
        $routes->fallbacks(DashedRoute::class);
    }
);
