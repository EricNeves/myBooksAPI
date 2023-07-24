<?php

class Core
{
  private $routes;

  public function __construct($routes)
  {
    $this->setRoutes($routes);
  }

  public function run()
  {
    $url = '/';

    (isset($_GET['url'])) ? $url .= $_GET['url'] : $url;

    ($url != '/') ? $url = rtrim($url, '/') : $url;

    $routerFound = false;

    foreach ($this->getRoutes() as $path => $serviceAndAction) {
      $pattern = '#^' . preg_replace('/{id}/', '([\w-]+)', $path) . '$#';

      if (preg_match($pattern, $url, $matches)) {

        array_shift($matches);
        
        $routerFound = true;

        [$currentService, $action] = explode('@', $serviceAndAction);

        require_once __DIR__ . "/../services/$currentService.php";

        $service = new $currentService();
        $service->$action($matches);
      }
    }

    if (!$routerFound) {
      require_once __DIR__ . "/../services/ErrorService.php";

      $service = new ErrorService();
      $service->index();
    }
  }

  private function getRoutes()
  {
    return $this->routes;
  }
  private function setRoutes($routes)
  {
    $this->routes = $routes;
  }
}