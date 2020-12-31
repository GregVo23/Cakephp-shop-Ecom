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
    
}
