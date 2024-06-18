<?php 
namespace App\Controller\Component;

use Cake\Controller\Component;

class MathComponent extends Component{
	
	
	public function add($a,$b){
		return $a+$b;
		
	}
	
	public function subtract($a,$b){
		return $a-$b;
	}
	
	
}






?>