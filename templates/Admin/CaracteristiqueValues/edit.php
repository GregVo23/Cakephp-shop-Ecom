<div class="container-fluid mt5">
    <div class='row'>
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Option des caractéristiques</h1>
        </div>
    </div>    

  
    <div class="card shadow my-4">
        <?= $this->Form->create($caracteristiqueValue) ?>
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Modifier une option</h6>
      </div>
      <div class="card-body">
          <?= $this->Form->control('nom', ['class' => 'form-control']) ?>
          
         
      </div>
      <div class="card-footer">
          <?= $this->Form->submit('Enregistrer', ['class' => 'btn btn-success']) ?>
      </div>
         <?= $this->Form->end() ?>
    </div>
  </div>
