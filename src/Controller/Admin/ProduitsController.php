<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\admin\AppController;

/**
 * Categories Controller
 *
 * @property \App\Model\Table\ProduitsTable $Produits
 * @method \App\Model\Entity\Produits[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ProduitsController extends AppController
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
        $produits = $this->paginate($this->Produits->find()
            ->contain(['Categories'])
            ->where(['Produits.deleted IS NULL']));

        $this->set(compact('produits'));
    }

    /**
     * View method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $produit = $this->Produits->get($id, [
            'contain' => ['Produits'],
        ]);

        $this->set(compact('produit'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $produit = $this->Produits->newEmptyEntity();
        if ($this->request->is('post')) {
            $produit = $this->Produits->patchEntity($produit, $this->request->getData());
            if ($this->Produits->save($produit)) {
                $this->Flash->success(__('Le produit a été ajouté.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Le produit n\'a pas pu être ajouté.'));
        }
        //Récupération de la liste des catégories
        //Produits->Categories ou $this->loadModel('Categories')
        $categories = $this->Produits->Categories
            ->find('list', ['keyfield' => 'id', 'valueField' => 'nom'])
            ->where(['deleted IS NULL']);
        
        $this->set(compact('produit', 'categories'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Produit id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $produit = $this->Produits->get($id, ['contain' => ['CaracteristiqueValues']]);
                
        if ($this->request->is(['patch', 'post', 'put'])) {
            $produit = $this->Produits->patchEntity($produit, $this->request->getData());
            
            if ($this->Produits->save($produit)) {
                $this->Flash->success(__('Le produit a été sauvegardée avec succés.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('Le produit n\'a pas pu être sauvegardée.'));
        }
        //Version 1 Abandonnée
        //Récupération de la liste des catégories 
        //Produits->Categories ou $this->loadModel('Categories')
        //$categories = $this->Produits->Categories
        //    ->find('list', ['keyfield' => 'id', 'valueField' => 'nom'])
        //    ->where(['deleted IS NULL']);
        //$this->set(compact('produit', 'categories'));
        
        //Version 2
        //Récupération de la liste des catégories 
        $categories = $this->Produits->Categories->find('list', ['keyField' => 'id', 'valueField' => 'nom'])
                ->where(['deleted IS NULL'])
                ->toArray();
        //Récupération des caractéristiques
        $this->loadModel('Caracteristiques');
        $caracteristiques = $this->Caracteristiques->find()
                ->contain([
                    'CaracteristiqueValues' => [
                        'conditions' => [
                            'deleted IS NULL'
                            ]
                        ]
                ])
                ->where(['deleted IS NULL'])
                ->toArray();
        //Parcours de toutes les caracteristiques
        $caracteristiqueValues = [];
        foreach($caracteristiques as $caracteristique){
            foreach($caracteristique->caracteristique_values as $caracteristique_value){
            
                $caracteristiqueValues[$caracteristique_value->id] = $caracteristique_value->nom;
            }
        }
        $this->set(compact('produit', 'categories', 'caracteristiques', 'caracteristiqueValues'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        //$this->request->allowMethod(['post', 'delete']);
        $produit = $this->Produits->get($id);

        $produit = $this->Produits->patchEntity($produit, ['deleted' => date('Y-m-d H:i:s')]);
        
        if ($this->Produits->save($produit)) {
            $this->Flash->success(__('Le produit a été supprimée.'));
        } else {
            $this->Flash->error(__('Le produit n\'a pas été supprimée, réessayer plus tard'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
