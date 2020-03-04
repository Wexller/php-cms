<?

namespace app\controllers;

use app\core\Controller;
use app\lib\DataBase;

Class MainController extends Controller {
    public function indexAction() {
      $db = new DataBase();

      $params = array(
        'id' => 2,
        'name' => 'Петя',
      );

      $data = $db->column('SELECT name FROM users WHERE id = :id AND name = :name', $params);
      var_dump($data);

      $this->view->render('Main page');
    }
}