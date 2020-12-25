<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\admin\AppController;

/**
 * Caracteristiques Controller
 *
 * @property \App\Model\Table\CaracteristiqueValuesTable $CaracteristiqueValues
 * @method \App\Model\Entity\CaracteristiqueValue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class CaracteristiqueValuesController extends AppController
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
    public function index($caracteristiqueId = null)
    {
        $caracteristiqueValues = $this->paginate($this->CaracteristiqueValues->find()->where(['caracteristique_id' => $caracteristiqueId, 'deleted IS NULL']));

        $this->set(compact('caracteristiqueId', 'caracteristiqueValues'));
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
        $caracteristiqueValues = $this->CaracteristiqueValues->get($id, [
            'contain' => ['Produits'],
        ]);

        $this->set(compact('caracteristiqueValues'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($caracteristiqueId)
    {
        $caracteristiqueValue = $this->CaracteristiqueValues->newEmptyEntity();
        if ($this->request->is('post')) {
            $caracteristiqueValue = $this->CaracteristiqueValues->patchEntity(
                    $caracteristiqueValue,
                    $this->request->getData() + ['caracteristique_id' => $caracteristiqueId]
                    );
            if ($this->CaracteristiqueValues->save($caracteristiqueValue)) {
                $this->Flash->success(__('La valeur de la caracteristique a été ajoutée.'));

                return $this->redirect(['action' => 'index', $caracteristiqueId]);
            }
            $this->Flash->error(__('La valeur de la caracteristique n\'a pas pu être ajoutée.'));
        }
        //dd($caracteristiqueValue);
        $this->set(compact('caracteristiqueValue'));
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
        $caracteristiqueValue = $this->CaracteristiqueValues->get($id);
                
        if ($this->request->is(['patch', 'post', 'put'])) {
            $caracteristiqueValue = $this->CaracteristiqueValues->patchEntity($caracteristiqueValue, $this->request->getData());
            
            if ($this->CaracteristiqueValues->save($caracteristiqueValue)) {
                $this->Flash->success(__('La valeur de la caracteristique a été sauvegardée avec succés.'));

                return $this->redirect(['action' => 'index', $caracteristiqueValue->caracteristique_id]);
            }
            $this->Flash->error(__('La valeur de la caracteristique n\'a pas pu être sauvegardée.'));
        }
        $this->set(compact('caracteristiqueValue'));
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
        $caracteristiqueValue = $this->CaracteristiqueValues->get($id);

        $caracteristiqueValue = $this->CaracteristiqueValues->patchEntity($caracteristiqueValue, ['deleted' => date('Y-m-d H:i:s')]);
        
        if ($this->CaracteristiqueValues->save($caracteristiqueValue)) {
            $this->Flash->success(__('La valeur de la caracteristique a été supprimée.'));
        } else {
            $this->Flash->error(__('La valeur de la caracteristique n\'a pas été supprimée, réessayer plus tard'));
        }

        return $this->redirect(['action' => 'index', $caracteristiqueValue->caracteristique_id]);
    }
}
