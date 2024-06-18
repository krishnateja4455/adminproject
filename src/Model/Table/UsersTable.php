<?php 

namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class UsersTable extends Table{
	
	
	
	public function validationDefault(Validator $validator){
				
		$validator
		->notEmpty('username','username required')
		->notEmpty('password','password required')
		->minLength('password',6,'Password should greater than 6')
		->minLength('username',6,'username should greater than 6');
		
		return $validator;
		
	}
	
	
}



?>