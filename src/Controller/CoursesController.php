<?php 

namespace App\Controller;

use App\Controller\AppController;

class CoursesController extends AppController{



public function initialize(){
	parent::initialize();
	
}


public function index(){
	
	$courseData=$this->Courses->find('all')->toArray();
	
	$this->set('data',$courseData);
	
	
	
}

public function add(){
		
	if($this->request->is('post')){		
				
		$token=md5($this->request->data('code').uniqid());
		
		$file=$this->request->data('image');
		
		if(!empty($file['name'])){
			
			move_uploaded_file($file['tmp_name'], WWW_ROOT . 'img/' . $file['name']);
			
		$this->request->data['image']=$file['name'];	
			
		}else{
			$this->request->data['image']='No image';
		}
				
		$course=$this->Courses->newEntity();
		$course=$this->Courses->patchEntity($course,$this->request->data);
		$course->token=$token;		
		if($this->Courses->save($course)){
			$measure=$this->Measures->newEntity();
			$measure->course_id=$course->id;
			$measure=$this->Measures->patchEntity($measure,$this->request->data);
			 if($this->Measures->save($measure)){
				 echo 'success';exit; 
			 }else{
				 echo 'fail';exit;
			 }
		}else{
			echo 'fail';exit;
		} 
		
			
		
	
	}
	
	
	
}

public function edit($id=null){
	
}


public function getting($id=null){
	$course=$this->Courses->get($id);
	echo json_encode($course);exit;
	
}


public function update(){
	
	
	if($this->request->is(['post','put'])){
		
		$dbcourse=$this->Courses->get($this->request->data['id']);
		$dbcourse=$this->Courses->patchEntity($dbcourse,$this->request->data);
		if($this->Courses->save($dbcourse)){
			$this->Flash->success('Course Updated Successfully');
			return $this->redirect(['action'=>'index']);
		}
		
		
	}
	
	
	
}
	

public function checking(){
	
	
	if($this->request->is('post')){
		
		$code=$this->request->data('code');
		
		$count=$this->Courses->find()->where(['code'=>$code])->count();
		
		if($count===0){			
			echo "yes";
		}else{
			echo "no";
		}
		
		
		exit;
		
	}
	
	
}


	
	
public function deleting($id=null){
	
	$delCourse=$this->Courses->get($id);
		
		if($this->Courses->delete($delCourse)){
			$this->Flash->success('Course deleted Succesfully');
			return $this->redirect(["action"=>'index']);
		}
	
}	
	
	
	
	
public function joins(){		
		$con=ConnectionManager::get('default');
		$sql='select * from courses left join  course_intake on courses.code= course_intake.course_code';
		$stmt=$con->execute($sql);
		$result=$stmt->fetchAll('assoc');
		echo "<pre>";
		print_r($result);
		exit;

	}
	
public function queryJoin(){
	
	$query=$this->Courses->find()
	->select(['name','course_intake.year','fee'])
	->innerJoin('course_intake',['Courses.code=course_intake.course_code']);
	
	$result=$query->toArray();
	echo "<pre>";
	print_r($result);
	exit;

}	


public function containing(){	
	$res=$this->Courses->find()->select(['name'])->contain('CourseIntake')->toArray();
	echo "<pre>";
	print_r($res);
	exit;
	
}







}


?>