<?php 
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;


class ProviderUsersTable extends Table{
	
	
	public function validationDefault(Validator $validator){
				
		$validator
		->notEmpty('email','email required')
		->notEmpty('password','password required')
		->minLength('password',6,'Password should greater than 6');
		
		
		return $validator;
		
	}
	
	
	
	}
	
	?>