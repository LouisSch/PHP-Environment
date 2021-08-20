<?php

namespace Louis\PhpSch;

use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;

class Renderer
{
    /**
     * Renderer tools to render twig page
     * 
     * @var Environment $renderer
     */
    protected Environment $renderer;

    public function __construct()
    {
        $loader = new FilesystemLoader(App::$container->get('view_path'));
        $this->renderer = new Environment($loader, [
            'strict_variables' => true
        ]);
        $this->renderer->addExtension(new DebugExtension());
        $this->renderer->addGlobal('title', App::$container->get('site_title'));
    }

    /**
     * Render a twig file
     * 
     * @param string $file name and extension of the file to render
     * @param Array $args arguments to place in the twig file
     * @return string the html code of the page
     */
    public function render(string $file, Array $args = []): string
    {
        return $this->renderer->render($file, $args);
    }
}