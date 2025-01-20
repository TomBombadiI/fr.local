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

    public function render($view, $data = [], $layout = ''): string
    {
        $viewFile = VIEWS . "/{$view}.php";

        if (file_exists($viewFile)) {
            extract($data);

            ob_start();
            require $viewFile;
            $this->content = ob_get_clean();
        } else {
            abort("View file '{$view}.php' not found", 500);
        }

        if (false === $layout) {
            return $this->content;
        }

        $layoutFilename = $layout ?: $this->layout;
        $layoutFilePath = VIEWS . "/layouts/{$layoutFilename}.php";

        if (file_exists($layoutFilePath)) {
            ob_start();
            require_once $layoutFilePath;
            return ob_get_clean();
        } else {
            abort("Layout file '{$layoutFilename}.php' not found", 500);
        }
    }
}
