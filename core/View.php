<?php

namespace PHPFramework;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View
{
    protected Environment $twig;
    protected string $layout;

    public function __construct(string $layout)
    {
        $this->layout = $layout;

        $loader = new FilesystemLoader(VIEWS);
        $this->twig = new Environment($loader, [
            'cache' => VIEWS . '/cache',
            'debug' => DEBUG,
        ]);
    }

    public function render($view, $data = [], $layout = 'default'): string
    {
        if ($layout) {
            $data['layout'] = $layout;
        }

        return $this->twig->render("{$view}.twig", $data);
    }
}
