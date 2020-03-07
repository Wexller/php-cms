<?

namespace app\models;

use app\core\Model;

class Main extends Model {
  public function getNews() {
    return $this->db->row('SELECT name, news_text FROM news');
  }
}