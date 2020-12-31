<div class="container-fluid mt5">
    <div class='row'>
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Commandes</h1>
        </div>
    </div>    

  
  <div class="card shadow my-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Liste des commandes</h6>
    </div>
    <div class="card-body">
    <?php //S'il n'y a pas d ecatégorie a afficher
    if(!$commandes->count()): ?>
    <div class="alert alert-info">
        Aucunes commandes a afficher
    </div>
    <?php else : ?>
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
                <?php //Boucle sur les commandes
                foreach($commandes as $commandes): ?>
                <tr>      
                <td class="align-middle"><?= $commandes->fullName ?></td>
                <td class="align-middle"><?= $commandes->created->format('d/m/Y') ?></td>
                <td class="text-right">
                    <?= $this->Html->link('<li class="fas fa-search"></li>', ['controller' => 'Commandes', 'action' => 'view', $commandes->id], ['class' => 'btn btn-primary', 'escape' => false]) ?>
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