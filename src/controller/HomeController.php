<?php

namespace Louis\PhpSch\Controller;

class HomeController extends ControllerModel
{
    public function exec(string $file, array $args = []): string
    {
        return $this->renderer->render($file, $args);
    }
}