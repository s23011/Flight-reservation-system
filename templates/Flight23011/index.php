
<?php 

$tasks = [['index'=>'①','text'=>'2024 年3 月1 日のRAC861 便の搭乗者名簿を表示する','name'=>'page1','enable'=>FALSE]
      ,['index'=>'②','text'=>'日付と便名を入力して搭乗者名簿を表示する','name'=>'page2','enable'=>FALSE]
      ,['index'=>'③','text'=>'2024 年3 月2 日の那覇→南大東便の予約状況を○△× で表示する','name'=>'page3','enable'=>TRUE]
      ,['index'=>'④','text'=>'日付と出発地・到着地を入力して予約状況を○△× で表示する','name'=>'page4','enable'=>TRUE]
      ,['index'=>'⑤','text'=>'④の画面に、顧客番号と便名から新たな予約を登録できるようにする','name'=>'page5','enable'=>FALSE]
      ,['index'=>'⑥','text'=>'⑤に対し、顧客番号とパスワードで認証するログイン画面を付ける','name'=>'page6','enable'=>FALSE]];

?>

<div class="container">
  <div class="bg-primary">
    <h1 class="text-center"> 航空便予約システム </h1>
  </div>

  <br>
  <br>

  <?php foreach($tasks as $task) : ?>
    <div class="row">
      <div class="col-sm-1">  </div>
      <div class="col-sm-1">  <?=$task['index']?> </div>
      <div class="col-sm-6">  <?=$task['text']?>  </div>
      <div class="col-sm-1">  </div>
      <div class="col-sm-2">  
        <button type="button" onclick="location.href='<?= '/flight23011/'.$task['name']?>'" class="btn btn-primary" <?=$task['enable']?'':'disabled'?>>
          <?=$task['name']?>  
        </button>
      </div>
      <div class="col-sm-1"> </div>
    </div>
    <br>
  <?php  endforeach; ?>
</div>
