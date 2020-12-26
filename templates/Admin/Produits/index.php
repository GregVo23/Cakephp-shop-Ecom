<div class="container-fluid mt5">
    <div class='row'>
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Produits</h1>
        </div>
        <div class="col text-right">
            <?= $this->Html->link('<li class="fas fa-plus"></li> Ajouter', ['action' => 'add'], ['class' => 'btn btn-success', 'escape' => false]) ?>
        </div>
    </div>    

  
  <div class="card shadow my-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Liste des produits</h6>
    </div>
    <div class="card-body">
    <?php //S'il n'y a pas d ecatégorie a afficher
    if(!$produits->count()): ?>
        <div class="alert alert-info">
            Aucun produit a afficher
        </div>
    <?php else : ?>
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>Catégorie</th>
                <th>Nom</th>
                <th>Prix</th>
                <th></th>
            </tr>
          </thead>
          <tbody>
                <?php //Boucle sur les catégories
                foreach($produits as $produit): ?>
                <tr>      
                <td class="align-middle"><?= $produit->category->nom ?></td>
                <td class="align-middle"><?= $produit->nom ?></td>
                <td class="align-middle"><?= $produit->prix ?></td>
                <td class="text-right">
                    <?= $this->Html->link('<li class="fas fa-edit"></li>', ['action' => 'edit', $produit->id], ['class' => 'btn btn-warning', 'escape' => false]) ?>
                    <?= $this->Html->link('<li class="fas fa-trash"></li>', ['action' => 'delete', $produit->id], ['class' => 'btn btn-danger', 'escape' => false, 'confirm' => 'Etes vous certain de supprimer ce produit ?']) ?>
                </td>
                </tr>
                <?php endforeach; ?>
          </tbody>
        </table>
      </div>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
              <?= $this->Paginator->prev('< ') ?>
              <?= $this->Paginator->numbers() ?>
              <?= $this->Paginator->next(' >') ?>
            </ul>
          </nav>
    <?php endif; ?>
    </div>
  </div>
  
</div>