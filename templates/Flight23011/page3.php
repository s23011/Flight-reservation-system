
<div class="container">
  <div class="bg-primary">
    <h1 class="text-center">航空便予約システム</h1>
  </div>

  <br>

  <div>
    <?= $this->Flash->render()?>
  </div>

  <br>

  <h2> 予約状況 </h2>
  <br>
  <h4> 日付: <?=$year?> 年 <?=$month?> 月 <?=$day?> 日 </h4>
  <h4> 出発地：<?=$departure_place?> </h4>
  <h4> 到着地：<?=$arrival_place?> </h4>

  <br>

  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <table class="table table-bordered table-sm">
        <tr>
          <td>便名</td><td>出発時刻</td><td>ビジネスクラス</td><td>エコノミークラス</td>
        </tr>
        
        <?php 
              $state_symbol=['×','△','○'];
              foreach($flights_reservation as $result):
        ?>    
        <tr>
          <td> <?=$result['flight']->flight_name?>  </td>
          <td> <?=$result['flight']->time?>         </td>
          <td> <?=$state_symbol[$result['business_state']]?>  </td>
          <td> <?=$state_symbol[$result['economy_state']]?>  </td>
        </tr>
        <?php endforeach;?>

      </table>
    </div>
    <div class="col-sm-1"></div>
  </div>

  <br>

  <div class="row">
    <div class="col-sm-10"></div>
    <div class="col-sm-2">
      <a type="button" href="/flight23011" class="btn btn-primary btn-lg btn-block"> 戻る </a>
    </div>
  </div>

