<?php 


namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;



class UsersController extends AppController{
	
	
public function beforeFilter(Event $event)
    {
        parent::beforeFilter($event);       
        $this->Auth->allow(['add']);
    }	
	
	public function beforeRender(Event $event){
		
		$this->viewBuilder()->setLayout('register');
	}
	
	
	
	public function login(){
		
		if($this->request->is('post')){		
			$provideruser=$this->Auth->identify();			
			if($provideruser){
				$this->Auth->setUser($provideruser);
				return $this->redirect($this->Auth->redirectUrl());
			}else{
				$this->Flash->error('error in username and password');
			}
			
		}			
	}
	
	public function add(){
		//$this->viewBuilder()->setLayout('register');
		
		if($this->request->is('post')){
			
			$user=$this->ProviderUsers->newEntity();
			$user=$this->ProviderUsers->patchEntity($user,$this->request->data);
		    
			if(empty($user->errors())){
					if($this->ProviderUsers->save($user)){
						
					$this->Flash->success('User created Successfully');
					return $this->redirect(['controller'=>'users','action'=>'login']);
				}else{
					
					$this->Flash->error('User not created');
				}
			}else{
				foreach($user->errors() as $key=>$value){
					foreach($value as $err){
						$this->Flash->error($err);
					}
					
				}
				return $this->redirect(['controller'=>'Users','action'=>'add']);
			}									
		}
		
	}
	
	public function logout(){				
		return $this->redirect($this->Auth->logout());				
	}
	
	
	
	
}





?>