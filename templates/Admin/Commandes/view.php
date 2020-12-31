<div class="container-fluid mt5">
    <div class='row'>
        <div class="col">
            <h1 class="h3 mb-2 text-gray-800">Commande</h1>
        </div>
        
        <div class="col text-right">
            <?= $this->Html->link(' < Retour', ['action' => 'index'], ['class' => 'btn btn-primary', 'escape' => false]) ?>
        </div>
    </div>    
  
  <div class="card shadow my-4">
    <div class="card-body">
        <h4><?= $commande->fullName ?></h4>
        <p><?= $commande->email ?></p>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
                <th>Nom</th>
                <th>Prix</th>
                <th>Quantité</th>
                <th>Total</th>
            </tr>
          </thead>
          <tbody>
                <?php //Boucle sur les commandes
                //dd($commande->commande_lignes);
                $total = 0;
                foreach($commande->commande_lignes as $commande_ligne):
                $total += $commande_ligne->quantite * $commande_ligne->produit->prix; ?>
                    <tr>      
                        <td class="align-middle"><?= $commande_ligne->produit->nom ?></td>
                        <td class="align-middle"><?= $commande_ligne->produit->prix ?></td>
                        <td class="align-middle"><?= $commande_ligne->quantite ?></td>
                        <td class="align-middle text-right font-weight-bold"><?= $this->number->currency($commande_ligne->quantite * $commande_ligne->produit->prix) ?></td>
                    </tr>
                <?php endforeach; ?>
                
                <tr>
                    <td colspan="4" class="text-right font-weight-bold"><?= $this->number->currency($total) ?></td>
                </tr>
          </tbody>
        </table>
    </div>
  </div>
  
</div>