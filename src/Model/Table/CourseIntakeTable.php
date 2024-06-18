<?php 

namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\ORM\RulesChecker;
use Cake\ORM\TableRegistry;


class CourseIntakeTable extends Table{
	
/*	
	public function initialize(array $config){
		
		
		$this->setTable('course_intake');
		$this->setPrimaryKey('course_code');
		$this->belongsTo('Courses',['foreignKey'=>'course_code']);
		
		
		
	}
	
	
	*/
	
	
public function buildRules(RulesChecker $rules){
		
	$rules->add($rules->isUnique(['course','course_code','year','location'],'intake this combination already exits'));

	return $rules;
}	



public function saving($data){
	
	$courseIntakeModel=TableRegistry::get('CourseIntake');
	$newCourse=$courseIntakeModel->newEntity();
	$newCourse=$courseIntakeModel->patchEntity($newCourse,$data);
	
	$courseIntakeModel->save($newCourse);
		return $newCourse;
		
  }
  
  
  public function repeat(){
	  
	  $courseModel=TableRegistry::get('Courses');
	  $courses= $courseModel->find('all')->select(['name'])->toArray();	
		$arr=[];		
		foreach($courses as $course){
			$arr += [ $course->name => $course->name ];			
		}	
	  
	return $arr;  
  }
  
  
  
	
}











?>