<?php 

namespace App\Controller;


use App\Controller\AppController;
use Cake\Datasource\ConnectionManager;


class CourseIntakeController extends AppController{
	
	
	public function initialize(){
		parent::initialize();
		
			
	}
	
	
	public function index(){	
   
			$conditions=null;
		if(!empty($_GET)){
			
			
			$search=$_GET['search'];
			if(!empty($_GET['search'])){
				$conditions['OR']['course LIKE']='%'.$search.'%';
				$conditions['OR']['course_code LIKE']='%'.$search.'%';
			}
			if(!empty($_GET['year'])){
				
				$conditions['AND']['year']=$_GET['year'];
			}
			if(!empty($_GET['location'])){
				$conditions['AND']['location']=$_GET['location'];
			}
	
		  }
		  
		$courseIntakes=$this->CourseIntake->find('all')->where($conditions)->toArray();
	  
		  $this->set('intakes',$courseIntakes);
		  		  
				  
				  
				  
				  
		  $years=$this->CourseIntake->find('all')->select(['year'])->distinct(['year'])->toArray();		  
		  $newYears=[];
		  foreach($years as $obj){
			 $newYears[$obj['year']]=$obj['year'];
		  }		  
		  $this->set('newYears',$newYears);
		  
		  
		  
		  $locations=$this->CourseIntake->find('all')->select(['location'])->distinct(['location'])->toArray();		
		 $newLocations=[];
		 foreach($locations as $obj){
			 $newLocations[$obj['location']]=$obj['location'];
		 }
		 $this->set('newLocations',$newLocations);
	  
	}
	
	
	
	public function common($data){		
		$dbresponse=$this->CourseIntake->saving($data);
			
			if(!empty($dbresponse->errors())){
			     $this->Flash->error('intake this combination already exits');					 
			}else{
				$this->Flash->success('Course Intake is added');
				return $this->redirect(['controller'=>'CourseIntake','action'=>'index']);
			}
		
	}
	
	
	public function add(){		
		
         $arr=$this->CourseIntake->repeat();
		
		$this->set('courses',$arr);		
		if($this->request->is('post')){			
				$this->common($this->request->data);					
		}
		
		
		
	}
	
	public function getting(){
		
		if($this->request->is('post')){
			$course=$this->request->data['course'];
			
			$code=$this->Courses->find()->select(['code'])->where(['name'=>$course])->toArray();
			$jsn=json_encode($code);
			echo $jsn;
			exit;
		}
		
	}
	
	
	public function edit($id=null){		
		$courseData=$this->CourseIntake->get($id);
		$this->set('course',$courseData);
		$arr=$this->CourseIntake->repeat();
		
		$this->set('courses',$arr);	

	}
	
	
	public function update($id=null){
		
		 if($this->request->is(['post','put'])){
			//$this->common($this->request->data);
			
		      $course=$this->CourseIntake->get($id);
			  $course=$this->CourseIntake->patchEntity($course,$this->request->data);
			  if($this->CourseIntake->save($course)){
				  $this->Flash->success('Updated Successfully');
				  $this->redirect(['controller'=>'CourseIntake','action'=>'index']);
			  }
			
		}
		
	}
	
	public function deleting($id=null){
		
		$delCourse=$this->CourseIntake->get($id);
		if($this->CourseIntake->delete($delCourse)){
			$this->Flash->success('Course Intake Deleted');
			$this->redirect(['controller'=>'CourseIntake','action'=>'index']);
		}
		
	}
	
	
	
	
	
	
	
	
	
	
}
















?>