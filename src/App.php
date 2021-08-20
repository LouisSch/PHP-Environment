<?php

namespace Louis\PhpSch;

use DI\Container;
use DI\ContainerBuilder;
use Louis\PhpSch\Controller\HomeController;
use Louis\PhpSch\DataBase\DataBaseManager;

class App
{
    /**
     * Container with configuration
     * 
     * @var Container $container
     */
    public static Container $container;

    /**
     * Router of the app
     * 
     * @var Router $router
     */
    private Router $router;

    /**
     * Renderer of the app
     * 
     * @var Renderer $renderer
     */
    public Renderer $renderer;

    public function __construct()
    {
        self::initializeContainer();
        $this->router = new Router();
        $this->renderer = new Renderer();
        
        $this->addRoutes();
    }

    /**
     * Initialize container containing configuration
     */
    private static function initializeContainer()
    {
        $builder = new ContainerBuilder();
        $builder->addDefinitions(__DIR__ . '/config.php');
        
        self::$container = $builder->build();
    }

    /**
     * Add route to the router
     */
    private function addRoutes(): void
    {
        $this->router
                    ->add('GET', '/', function (){
                        echo (new HomeController($this->renderer))->exec('home.html.twig');
                    }, 'home')
                    ->add('GET', '/account/connection', function (){
                        echo "Hey";
                    }, 'account_connection');
    }

    /**
     * Run all features of the app
     */
    public function run(): void
    {
        $this->router->run($this);
    }
}