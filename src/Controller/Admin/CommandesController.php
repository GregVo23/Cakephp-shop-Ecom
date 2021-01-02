<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\admin\AppController;

/**
 * Caracteristiques Controller
 *
 * @property \App\Model\Table\CommandesTable $Commandes
 * @method \App\Model\Entity\Commande[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CommandesController extends AppController
{
    public $paginate = [
        'limit' => 2,
    ];


    public function initialize() : void
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $commandes = $this->paginate($this->Commandes->find());

        $this->set(compact('commandes'));
        //equivaut a: $this->set(['commandes' => $commandes]);
    }
    
     /**
     * View method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function view($idCommande)
    {
        //commande_lignes.Produits ---> pour récupérer les commandes_lignes et leur produits associés
        $commande = $this->Commandes->get($idCommande, ['contain' => ['CommandeLignes.Produits']]);

        $this->set(compact('commande'));
    }
    
     /**
     * Export method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function export()
    {
        
        $commandes = $this->Commandes->find()->contain('CommandeLignes.Produits');
        
        $data = [['Nom', 'Email', 'Total']];
        foreach ($commandes as $commande):
            $tableauCommande = [];
            $tableauCommande[] = $commande->fullName;
            $tableauCommande[] = $commande->email;
            
            $total = 0;
            foreach ($commande->commande_lignes as $commande_lignes):
                $total += $commande_lignes->produit->prix;
            endforeach;
            $tableauCommande[] = $total;
            
            $data = $tableauCommande;
        endforeach;
        
        /*
        $this->set(compact('data'));
        $this->viewBuilder()
                ->setClassName('CsvView.Csv')
                ->setOption([
                    'serialize' => 'data',
                    'delimiter' => ';',
                    'bom' => true,
                ]);

        $this->response = $this->response->withDownload('commandes.csv');
        */
     
    //dd($data);
    /*
        $data = [
        ['a', 'b', 'c'],
        [1, 2, 3],
        ['you', 'and', 'me'],
    ];
     
     */
        
    $this->response = $this->response->withDownload('commandes.csv');
    //$commandes = $this->Commandes->find()->all();
    $_serialize = 'data';
    $_header = ['Nom', 'Email', 'Total'];
    //$_extract = ['id', 'name', 'username', 'role', 'created', 'modified'];

    $this->viewBuilder()->setClassName('CsvView.Csv');
    //$this->set(compact('users', '_serialize', '_header', '_extract'));
    $this->set(compact('data', '_serialize', '_header'));
    
    }
}
