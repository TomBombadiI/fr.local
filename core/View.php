<?php

namespace PHPFramework;

class View
{
    public string $layout;
    public string $content = '';

    public function __construct(string $layout)
    {
        $this->layout = $layout;
    }

    public function render($view, $data = [], $layout = '')
    {
        $viewFile = VIEWS . "/{$view}.php";

        if (is_file($viewFile)) {
            ob_start();
            require $viewFile;
            
            return ob_get_clean();
        } else {
            return 'not found view ' . $viewFile;
        }
    }
}
