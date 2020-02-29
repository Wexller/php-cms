<?

namespace app\controllers;

use app\core\Controller;

Class MainController extends Controller {
    public function indexAction() {
      $this->view->render('Main page');
    }
}