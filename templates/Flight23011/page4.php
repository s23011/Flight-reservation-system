
<div class="container">
  <div class="bg-primary">
    <h1 class="text-center">航空便予約システム</h1>
  </div>

  <br>

  <div>
    <h3 style="color:red"><?= $this->Flash->render()?></h3>
  </div>

  <br>

  <?= $this->Form->create() ?>
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-10"> <h4> 出発日を入力してください </h4> </div>
    </div>

    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-2"> 
        <?= $this->Form->year('year', ['min' => date('Y'),'max' => date('Y')+3]);  ?>
      </div>
      <div class="col-sm-1">年</div>
      <div class="col-sm-2"> 
        <?= $this->Form->year('month', ['min' => 1,'max' => 12]);  ?>
      </div>
      <div class="col-sm-1">月</div>
      <div class="col-sm-2"> 
        <?= $this->Form->year('day', ['min' => 1,'max' => 31]);  ?>
      </div>
      <div class="col-sm-1">日</div>
    </div>

    <br>
    
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-10"> <h4> 出発地・到着地を選択してください </h4> </div>
      
    </div>
    <div class="row">
      <div class="col-sm-1"></div>
      <div class="col-sm-1">出発地</div>
      <div class="col-sm-4"> 
        <?php $places = ['那覇'=>'那覇', '南大東'=>'南大東']; ?>
        <?= $this->Form->select('departure_place', $places ,['empty'=>true]);  ?>
      </div>
      <div class="col-sm-1">到着地</div>
      <div class="col-sm-4"> 
        <?= $this->Form->select('arrival_place', $places ,['empty'=>true]);  ?>
      </div>
    </div>

    <br>
    <br>

    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-3">
        <?= $this->Form->button( '次へ',['type' => 'submit', 'class' => 'btn btn-primary btn-lg btn-block'] ) ?>
      </div>
      <div class="col-sm-2"></div>
      <div class="col-sm-3">
        <a type="button" href="/flight23011" class="btn btn-primary btn-lg btn-block"> 戻る </a>
      </div>
      <div class="col-sm-2"></div>
    </div>

  <?= $this->Form->end() ?>
</div>
