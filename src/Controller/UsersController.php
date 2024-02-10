<?php
// In src/Controller/UsersController.php
namespace App\Controller;
use App\Controller\AppController;
use Cake\Event\EventInterface;
use Cake\Datasource\FactoryLocator;class UsersController extends AppController{	public $usersTableObj;	public function beforefilter(EventInterface $event){
	    parent::beforefilter($event);
	    $this->usersTableObj = FactoryLocator::get('Table')->get('Users');
        }
    public function add(){
    	$userEnt = $this->usersTableObj->newEmptyEntity();
    	if ($this->request->is('post')) {
    	    $userPost = $this->request->getData();
            $users = $this->usersTableObj->patchEntity($userEnt, $userPost);
            if ($this->usersTableObj->save($userEnt)) {
    		$this->Flash->success(__('Your user has been saved.'));
                return $this->redirect(['controller'=>'Users','action' => 'index']);
    	    }else{
    		$this->Flash->error(__('Unable to add your user.'));
                return $this->redirect(['controller'=>'Users','action' => 'add']);
    	    }
    	}
    	$this->set(compact('userEnt', $userEnt));
    }}