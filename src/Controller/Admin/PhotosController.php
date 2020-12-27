<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\admin\AppController;

/**
 * Photos Controller
 *
 * @property \App\Model\Table\PhotosTable $Photos
 * @method \App\Model\Entity\Photo[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class PhotosController extends AppController
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
    public function index($produitId = null)
    {
        $photos = $this->paginate($this->Photos->find()->where(['produit_id' => $produitId, 'deleted IS NULL']));

        $this->set(compact('produitId', 'photos'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add($produitId)
    {
        $photo = $this->Photos->newEmptyEntity();
        if ($this->request->is('post')) {
            $photo = $this->Photos->patchEntity(
                    $photo,
                    $this->request->getData() + ['produit_id' => $produitId]
                    );
            if ($this->Photos->save($photo)) {
                $this->Flash->success(__('La photo a été ajoutée.'));

                return $this->redirect(['action' => 'index', $produitId]);
            }
            $this->Flash->error(__('La photo n\'a pas pu être ajoutée.'));
        }
        $this->set(compact('photo'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $photo = $this->Photos->get($id);
                
        if ($this->request->is(['patch', 'post', 'put'])) {
            $photo = $this->Photos->patchEntity($photo, $this->request->getData());
            
            if ($this->Photos->save($photo)) {
                $this->Flash->success(__('La photo a été sauvegardée avec succés.'));

                return $this->redirect(['action' => 'index', $photo->produit_id]);
            }
            $this->Flash->error(__('La photo n\'a pas pu être sauvegardée.'));
        }
        $this->set(compact('photo'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Photo id.
     * @return \Cake\Http\Response|null|void Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $photo = $this->Photos->get($id);

        $photo = $this->Photoss->patchEntity($photo, ['deleted' => date('Y-m-d H:i:s')]);
        
        if ($this->Photos->save($photo)) {
            $this->Flash->success(__('La photo a été supprimée.'));
        } else {
            $this->Flash->error(__('La photo n\'a pas été supprimée, réessayer plus tard'));
        }

        return $this->redirect(['action' => 'index', $photo->produit_id]);
    }
}
