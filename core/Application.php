<?php

namespace PHPFramework;

class Application
{

    public Request $request;
    public Response $response;
    public Router $router;
    public View $view;
    public static Application $app;

    public function __construct(
        Request $request,
        Response $response,
        Router $router,
        View $view
    ) {
        self::$app = $this;

        $this->request = $request;
        $this->response = $response;
        $this->router = $router;
        $this->view = $view;
    }

    public function run(): void
    {
        try {
            echo $this->router->dispatch();
        } catch (\Exception $exception) {
            $this->response->setResponseCode(500);
            echo '500 - error';
        }
    }
}
