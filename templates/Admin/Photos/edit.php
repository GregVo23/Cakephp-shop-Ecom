<div class="container-fluid mt5">
    <div class='row'>
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Modifier les photos</h1>
        </div>
    </div>    

  
    <div class="card shadow my-4">
        <?= $this->Form->create($photo, ['type' => 'file']) ?>
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Modifier une photo</h6>
      </div>
      <div class="card-body">
          <?= $this->Form->control('file', ['class' => 'form-control', 'type' => 'file']) ?>
          
         
      </div>
      <div class="card-footer">
          <?= $this->Form->submit('Enregistrer', ['class' => 'btn btn-success']) ?>
      </div>
         <?= $this->Form->end() ?>
    </div>
  </div>
