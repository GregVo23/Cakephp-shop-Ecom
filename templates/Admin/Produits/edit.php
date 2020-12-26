<div class="container-fluid mt5">
    <div class='row'>
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Produits</h1>
        </div>
    </div>    

  
    <div class="card shadow my-4">
        <?= $this->Form->create($produit) ?>
      <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Modifier un produit</h6>
      </div>
      <div class="card-body">
          
          <div class="row">
          <div class ="col-6">

            <?= $this->Form->control('category_id', ['class' => 'form-control', 'options' => $categories, 'class' => 'select2']) ?>
          </div>
          
          <div class ="col-6">
            <?= $this->Form->control('nom', ['class' => 'form-control']) ?>
          </div>
          
          <div class ="col-6">
            <?= $this->Form->control('description', ['class' => 'form-control']) ?>
          </div>
          
          <div class ="col-6">
            <?= $this->Form->control('prix', ['class' => 'form-control']) ?>
          </div>
              
        </div>
          <h4>Les caractéristiques</h4>
          <div class ="row">
            <?= $this->Form->control('caracteristique_values._ids', ['class' => 'form-control', 'options' => $caracteristiqueValues, 'class' => 'select2']) ?>
          </div>
       
      </div>
      <div class="card-footer">
          <?= $this->Form->submit('Enregistrer', ['class' => 'btn btn-success']) ?>
      </div>
         <?= $this->Form->end() ?>
    </div>
  </div>
