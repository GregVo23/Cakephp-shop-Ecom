<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    
    public function beforeFilter($event)
    {
        parent::beforeFilter($event);
        
        $this->Authentication->addUnauthenticatedActions(['login']);
    }
    /**
     *
     */
    public function login()
    {
        $this->getRequest()->allowMethod(['get', 'post']);
        
        $result = $this->Authentication->getResult();
        
        if($result->isValid()){
            return $this->redirect(['controller' => 'Commandes', 'action' => 'index']);
        }
        if($this->getRequest()->is('post') && !$result->isValid()){
            $this->Flash->error('Connexion non réussie.');
        }
        
        $this->viewBuilder()->setLayout('Backtheme.login');
    }
    
    
    public function logout()
    {
        $result = $this->Authentication->getResult();
        
        if($result->isValid()){
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        
        $this->Flash->error('Impossible de vous déconnecter');
        return $this->redirect($this->referer());
    }
}
