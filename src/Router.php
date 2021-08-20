<?php

namespace Louis\PhpSch;

use AltoRouter;
use function Http\Response\send;
use GuzzleHttp\Psr7\Response;

class Router
{
    /**
     * Contains Alto Router
     * 
     * @var AltoRouter $router 
     */
    private AltoRouter $router;

    public function __construct()
    {
        $this->router = new AltoRouter();
    }

    /**
     * Add a route to the router
     * 
     * @param string $type GET POST...
     * @param string $route route
     * @param callable $controller function to execute
     * @param string|null $name name of the route
     * @return Router
     */
    public function add(string $type, string $route, callable $controller, string|null $name = null): self
    {
        $this->router->map($type, $route, $controller, $name);
        return $this;
    }

    /**
     * Start router
     */
    public function run(App $app): void
    {
        $match = $this->router->match();
        if ($match){
            $resp = new Response(200, [], $match["target"]());
        } else {
            $resp = new Response(404, [], $app->renderer->render('special/404.html.twig'));
            send($resp);
        }
    }
}