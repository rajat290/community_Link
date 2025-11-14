<?php
// use Cake\Routing\Route\DashedRoute;
// use Cake\Routing\Router;

// return static function (\Cake\Routing\RouteBuilder $routes) {

//     $routes->setRouteClass(DashedRoute::class);

    /*
     * -------------------------------------------
     * PUBLIC PAGES (Use public.php layout)
     * -------------------------------------------
     */

    // Home page
    // $routes->connect('/', [
    //     'controller' => 'Pages',
    //     'action' => 'display',
    //     'home'
    // ]);

    // Public Volunteer Registration
    // $routes->connect('/volunteer-register', [
    //     'controller' => 'Volunteers',
    //     'action' => 'publicRegister'
    // ]);

    // Public Partner Registration
    // $routes->connect('/partner-register', [
    //     'controller' => 'PartnerOrganisations',
    //     'action' => 'publicRegister'
    // ]);


    /*
     * -------------------------------------------
     * ADMIN & STAFF AREA (default layout.php)
     * -------------------------------------------
     */

    // Dashboard
    // $routes->connect('/dashboard', [
    //     'controller' => 'Dashboard',
    //     'action' => 'index'
    // ]);

    // Standard CRUD for all resources
    // $routes->scope('/', function ($builder) {

    //     // Volunteers CRUD
    //     $builder->connect('/volunteers', ['controller' => 'Volunteers', 'action' => 'index']);
    //     $builder->connect('/volunteers/:action/*', ['controller' => 'Volunteers']);

        // Partner Organisations CRUD
        // $builder->connect('/partner-organisations', ['controller' => 'PartnerOrganisations', 'action' => 'index']);
        // $builder->connect('/partner-organisations/:action/*', ['controller' => 'PartnerOrganisations']);

        // Skills CRUD
        // $builder->connect('/skills', ['controller' => 'Skills', 'action' => 'index']);
        // $builder->connect('/skills/:action/*', ['controller' => 'Skills']);

        // Events CRUD
        // $builder->connect('/events', ['controller' => 'Events', 'action' => 'index']);
        // $builder->connect('/events/:action/*', ['controller' => 'Events']);

        // Events-Volunteers join table
        // $builder->connect('/events-volunteers', ['controller' => 'EventsVolunteers', 'action' => 'index']);
        // $builder->connect('/events-volunteers/:action/*', ['controller' => 'EventsVolunteers']);

        // Documents (file uploads)
    //     $builder->connect('/documents/:action/*', ['controller' => 'Documents']);
    // });


    /*
     * -------------------------------------------
     * FALLBACKS (DO NOT REMOVE)
     * -------------------------------------------
     */
//     $routes->fallbacks(DashedRoute::class);
// };
// <?php
use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;
use Cake\Routing\Router;

Router::defaultRouteClass(DashedRoute::class);

Router::scope('/', function (RouteBuilder $builder) {
    // Public routes
    $builder->connect('/', ['controller' => 'Pages', 'action' => 'display', 'home']);
    $builder->connect('/volunteer-register', ['controller' => 'Volunteers', 'action' => 'publicRegister']);
    $builder->connect('/partner-register', ['controller' => 'PartnerOrganisations', 'action' => 'add']);
    
    // Staff/admin routes
    $builder->connect('/dashboard', ['controller' => 'Dashboard', 'action' => 'index']);
    
    // Enable default routes for CRUD operations
    $builder->fallbacks();
});

// Plugin routes
Router::plugin('DebugKit', function (RouteBuilder $builder) {
    $builder->connect('/toolbar/*', ['controller' => 'Requests', 'action' => 'view']);
});