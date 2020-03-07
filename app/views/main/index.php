<h2>Main page</h2>

<? foreach ($news as $value): ?>
  <h3><?=$value['name']?></h3>
  <p><?=$value['news_text']?></p>
  <hr>
<? endforeach; ?>