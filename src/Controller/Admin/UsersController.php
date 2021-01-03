<?php
declare(strict_types=1);

namespace App\Controller\Admin;

use App\Controller\admin\AppController;

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
     * Connexion
     */
    public function login()
    {
        $this->getRequest()->allowMethod(['get','post']);
        
        $result = $this->Authentication->getResult();
        //dump($result);
        if($result->isValid()){
            return $this->redirect(['controller' => 'commandes', 'action' => 'index']);
        }
        
        if($this->getRequest()->is('post') && !$result->isValid()){
            $this->Flash->error('Connexion non réussie.');
        }
        $this->viewBuilder()->setLayout('BackTheme.login');
    }
    
    /**
     * Déconnexion
     */
    public function logout()
    {
        $this->getRequest()->allowMethod(['get','post']);
        
        $result = $this->Authentication->getResult();
        
        if($result->isValid()){
            $this->Authentication->logout();
            return $this->redirect(['controller' => 'Users', 'action' => 'login']);
        }
        return $this->redirect($this->referer());
    }
}
