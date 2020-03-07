<?

namespace app\controllers;

use app\core\Controller;

Class MainController extends Controller {
    public function indexAction() {
      $result = $this->model->getNews();
      $vars = array(
        'news' => $result,
      );
      $this->view->render('Main page', $vars);
    }
}