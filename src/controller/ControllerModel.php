<?php

namespace Louis\PhpSch\Controller;

use Louis\PhpSch\Renderer;

abstract class ControllerModel
{
    /**
     * Renderer to get HTML code from twig file
     * 
     * @var Renderer $renderer
     */
    protected Renderer $renderer;

    public function __construct(Renderer $render)
    {
        $this->renderer = $render;
    }

    /**
     * All actions to do plus rendering of the page
     * 
     * @param string $file file to render
     * @param array $args arguments to give to twig file
     * @return string HTML code inside a string
     */
    abstract function exec(string $file, array $args = []): string;
}