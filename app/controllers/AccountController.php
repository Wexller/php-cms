<?

namespace app\controllers;

use app\core\Controller;

Class AccountController extends Controller {
  public function loginAction() {
    $this->view->render('Sign-in');
  }

  public function registerAction() {
    $this->view->render('Sign-up');
  }
}