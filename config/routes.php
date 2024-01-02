<?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return function (RouteBuilder $routes): void {
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder): void {
        // Add a route for the root URL to the index action of the ProjectsController
        $builder->connect('/', ['controller' => 'Projects', 'action' => 'index']);
        $builder->connect('/users/login', ['controller' => 'Users', 'action' => 'login']);
        $builder->connect('/projects/add', ['controller' => 'Projects', 'action' => 'add']);
        $builder->connect('/projects/view', ['controller' => 'Projects', 'action' => 'view']);
        $builder->connect('/projects/edit', ['controller' => 'Projects', 'action' => 'edit']);
        $builder->connect('/users', ['controller' => 'Users', 'action' => 'index']);
        $builder->connect('/users/add', ['controller' => 'Users', 'action' => 'add']);
        $builder->connect('/users/edit', ['controller' => 'Users', 'action' => 'edit']);
        $builder->connect('/clients', ['controller' => 'Clients', 'action' => 'index']);
        $builder->connect('/clients/add', ['controller' => 'Clients', 'action' => 'add']);
        $builder->connect('/clients/view', ['controller' => 'Clients', 'action' => 'view']);
        $builder->connect('/clients/edit', ['controller' => 'Clients', 'action' => 'edit']);
        $builder->connect('/questionnaires', ['controller' => 'Questionnaires', 'action' => 'index']);
        $builder->connect('/questionnaires/add', ['controller' => 'Questionnaires', 'action' => 'add']);
        $builder->connect('/questionnaires/view', ['controller' => 'Questionnaires', 'action' => 'view']);
        $builder->connect('/questionnaires/edit', ['controller' => 'Questionnaires', 'action' => 'edit']);

        // Fallback route
        $builder->fallbacks();
    });
};
