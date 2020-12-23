<div class="container-fluid mt5">
    <div class='row'>
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Catégories</h1>
        </div>
        <div class="col text-right">
            <?= $this->Html->link('<li class="fas fa-edit"></li> Ajouter', ['action' => 'add'], ['class' => 'btn btn-success', 'escape' => false]) ?>
        </div>
    </div>    

  
  <div class="card shadow my-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Liste des catégories</h6>
    </div>
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>Nom</th>
                <th>Date de création</th>
                <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
                <?php //Boucle sur les catégories
                foreach($categories as $categorie): ?>
                <td class="align-middle"><?= $categorie->nom ?></td>
                <td class="align-middle"><?= $categorie->created->format('d/m/Y') ?></td>
                <td class="text-right">
                    <?= $this->Html->link('<li class="fas fa-edit"></li>', ['action' => 'edit'], ['class' => 'btn btn-warning', 'escape' => false]) ?>
                    <?= $this->Html->link('<li class="fas fa-trash"></li>', ['action' => 'delete'], ['class' => 'btn btn-danger', 'escape' => false, 'confirm' => 'Etes vous certain de supprimer cette catégorie']) ?>
                </td>
                <?php endforeach; ?>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
  
</div>