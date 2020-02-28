<?

namespace app\core;

class Router {

  protected $routes = [];
  protected $params = [];

  function __construct()
  {
    $arr = require_once 'app/config/routes.php';
    foreach ($arr as $key => $val) {
      $this->add($key, $val);
    }
  }

  public function add($route, $params) {
    $route = "#^$route$#";
    $this->routes[$route] = $params;
  }

  function match() {
    $url = trim($_SERVER['REQUEST_URI'], '/');
    foreach ($this->routes as $route => $params) {
      if (preg_match($route, $url, $matches)) {
        $this->params = $params;
        return true;
      }
    }

    return false;
  }

  function run() {
    if ($this->match()) {
      $controller = 'app\controllers\\' . ucfirst($this->params['controller'] . 'Controller.php');
      if (class_exists($controller)) {
        echo 'OK';
      } else {
        echo 'Class not found' . $controller;
      }
    } else {
      echo 'Rote not found';
    }
  }
}