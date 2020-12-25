<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\admin\AppController;

/**
 * Caracteristiques Controller
 *
 * @property \App\Model\Table\CaracteristiquesTable $Caracteristiques
 * @method \App\Model\Entity\Category[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CaracteristiquesController extends AppController
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
        $caracteristiques = $this->paginate($this->Caracteristiques->find()->where(['deleted IS NULL']));

        $this->set(compact('caracteristiques'));
        //equivaut a: $this->set(['caracteristiques' => $caracteristiques]);
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
        $category = $this->Caracteristiques->get($id, [
            'contain' => ['Produits'],
        ]);

        $this->set(compact('caracteristiques'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $caracteristique = $this->Caracteristiques->newEmptyEntity();
        if ($this->request->is('post')) {
            $caracteristique = $this->Caracteristiques->patchEntity($caracteristique, $this->request->getData());
            if ($this->Caracteristiques->save($caracteristique)) {
                $this->Flash->success(__('La caracteristique a été ajoutée.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La caracteristique n\'a pas pu être ajoutée.'));
        }
        $this->set(compact('caracteristique'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Category id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $caracteristique = $this->Caracteristiques->get($id);
                
        if ($this->request->is(['patch', 'post', 'put'])) {
            $caracteristique = $this->Caracteristiques->patchEntity($caracteristique, $this->request->getData());
            
            if ($this->Caracteristiques->save($caracteristique)) {
                $this->Flash->success(__('La caracteristique a été sauvegardée avec succés.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('La caracteristique n\'a pas pu être sauvegardée.'));
        }
        $this->set(compact('caracteristique'));
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
        $caracteristique = $this->Caracteristiques->get($id);

        $caracteristique = $this->Caracteristiques->patchEntity($caracteristique, ['deleted' => date('Y-m-d H:i:s')]);
        
        if ($this->Caracteristiques->save($caracteristique)) {
            $this->Flash->success(__('La caracteristique a été supprimée.'));
        } else {
            $this->Flash->error(__('La caracteristique n\'a pas été supprimée, réessayer plus tard'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
