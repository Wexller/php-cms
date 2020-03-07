<?php


namespace app\core;


abstract class Controller {
  public $route;
  public $view;
  public $model;
  public $acl;

  public function __construct($route) {
    $this->route = $route;
    if(!$this->checkAcl()) {
      View::errorCode(403);
    }
    $this->view = new View($route);
    $this->model = $this->loadModel($route['controller']);
  }

  public function loadModel($name) {
    $path = 'app\models\\' . ucfirst($name);
    if (class_exists($path)) {
      return new $path();
    }
  }

  public function checkAcl() {
    $file =  'app/acl/' . $this->route['controller'] . '.php';
    if (file_exists($file)) {
      $this->acl = require_once 'app/acl/' . $this->route['controller'] . '.php';
      if ($this->isAcl('all')) {
        return true;
      } elseif (isset($_SESSION['authorize']['id']) and $this->isAcl('authorize')) {
        return true;
      } elseif (!isset($_SESSION['guest']['id']) and $this->isAcl('guest')) {
        return true;
      } elseif (!isset($_SESSION['admin']) and $this->isAcl('admin')) {
        return true;
      }
      return false;
    }
  }

  private function isAcl($key) {
    return in_array($this->route['action'], $this->acl[$key]);
  }
}