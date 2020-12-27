<div class="container-fluid mt5">
    <div class='row'>
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Photos</h1>
        </div>
    </div>    

  
    <div class="card shadow my-4">
        <?= $this->Form->create($photo, ['type' => 'file']) ?>
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Ajouter une photo</h6>
      </div>
      <div class="card-body">
          <div class="row">
              <div class="col-6" >
                  <?= $this->Form->control('alt', ['class' => 'form-control']) ?>
              </div>
              <div class="col-6" >
                  <?= $this->Form->control('file', ['class' => 'form-control', 'type' => 'file']) ?>
              </div>
          </div>
          
          
         
      </div>
      <div class="card-footer">
          <?= $this->Form->submit('Enregistrer', ['class' => 'btn btn-success']) ?>
      </div>
         <?= $this->Form->end() ?>
    </div>
  </div>
