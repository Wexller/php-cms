<?

namespace app\controllers;

use app\core\Controller;

Class AccountController extends Controller {
  public function loginAction() {
    if (!empty($_POST)) {
      $this->view->location('/');
    }
    $this->view->render('Sign-in');
  }

  public function registerAction() {
    $this->view->render('Sign-up');
  }
}