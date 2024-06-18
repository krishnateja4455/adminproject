<?php 

namespace App\Controller;

use App\Controller\AppController;
use Cake\Mailer\Email;


class FormController extends AppController{
	
	
	public function initialize(){
		parent::initialize();
		
		
		
	}
	
	
	public function index(){
		
		$UsersData=$this->Students->find('all')->toArray();
		
		$this->set('data',$UsersData);
		 
	}
	
	public function registration(){	
		
	   if($this->request->is('post')){				
			$this->request->data['date_of_birth']=date('Y-m-d',strtotime($this->request->data['date_of_birth']));
		   
		   var_dump($this->request->data['date_of_birth']);				   		   
		   $user=$this->Students->newEntity();
		   $user=$this->Students->patchEntity($user,$this->request->data);		   
		   if($this->Students->save($user)){
			   
			   $this->Flash->success('Student Added Successfully');
			   return $this->redirect(['action'=>'index']);
		   }
		   
	   }
	
		
	}
	
	
	public function edit($id=null){
       if(isset($id)){		
		$user=$this->Students->get($id);		
	    $this->set('data',$user);
	   }		
	   
	   if($this->request->is(['post','put'])){
			$user=$this->Students->get($this->request->data['id']);
			$user=$this->Students->patchEntity($user,$this->request->data);
			if($this->Students->save($user)){
				$this->Flash->success("User updated Successfully");
				return $this->redirect(["action"=>'index']);	
			}else{
				$this->Flash->error("failed while updating");
			}
		}
	   
	}
	
	public function deleting($id=null){
		
		$user=$this->Students->get($id);
		
		if($this->Students->delete($user)){
			$this->Flash->success('User deleted Succesfully');
			return $this->redirect(["action"=>'index']);
		}
		
	}	
	
	public function csv()
{
    $this->setResponse($this->getResponse()->withDownload('my-file.csv'));
	$_header = ['id', 'first_name','middle_name','last_name','passport_number','data_of_birth','pic','country','number','email','gender'];
    $students = $this->Students->find();
	
    $_serialize = 'students';

    $this->viewBuilder()->setClassName('CsvView.Csv');
    $this->set(compact( 'students','_serialize','_header'));
}

public function import(){
	
	if($this->request->is('post')){
		
		
		$file=$this->request->data;
		
		$tmp_name=$file['csv']['tmp_name'];
		$data=array_map('str_getcsv',file($tmp_name));
		
		$headers=['first_name','middle_name','last_name','passport_number','date_of_birth','pic','country','number','email','gender'];
		
		$headerErrors=[];
		foreach($data[0] as $obj){			
		   if(!in_array($obj,$headers)){
			  $headerErrors['header']['error']=$obj;   
		   }
		}
		
		if(empty($headerErrors)){
		
				$errors=[];
				$line=2;
				unset($data[0]);
				foreach($data as $obj){
				   if(empty($obj[7])){
					   $errors[$line]['error']="number";
				   }
				   $line++;
				}		
		if(empty($errors)){
				unset($data[0]);
				
				$values=[];
			foreach($data as $obj){
				$date=date('Y-m-d',strtotime($obj[4]));
				
				//echo "<pre>";
				//var_dump($date);
				
				
				$values['first_name']=$obj[0];
				$values['middle_name']=$obj[1];
				$values['last_name']=$obj[2];
				$values['passport_number']=$obj[3];
				$values['data_of_birth']=$date;
				$values['pic']=$obj[5];
				$values['country']=$obj[6];
				$values['number']=$obj[7];
				$values['email']=$obj[8];
				$values['gender']=$obj[9];
			
				$student=$this->Students->newEntity();
				$student=$this->Students->patchEntity($student,$values);
				
				$this->Students->save($student);
				
			}
				    
			$this->Flash->success('Added Successfully');
					return $this->redirect(['controller'=>'Form','action'=>'index']);
		
		}else{
			
			foreach($errors as $err=>$value){
			 
			 $this->Flash->error('At line'.$err.$value['error'].'should not be empty');
			 return $this->redirect(['controller'=>'Form','action'=>'registration']);
			
			}
		}
		
	}else{
		
		foreach($headerErrors as $err=>$value){
			 
			 $this->Flash->error($err." ".$value['error'].' is inccorect in excel ');
			 return $this->redirect(['controller'=>'Form','action'=>'registration']);
			
			}
		
	}	
				
		exit;
	}
	
	
	
}
	
	
 public function sample(){
	 
	 $this->setResponse($this->getResponse()->withDownload('sample.csv'));
	
	 $data = [
        ['Chandra', 'Surya', 'Teja','KHPP123456J','year-month-day','india','ISraile','9122345123','Surya@gmail.com','male']
    ];
	
	$_header = ['first_name','middle_name','last_name','passport_number','data_of_birth','pic','country','number','email','gender'];
    
	
    $_serialize = 'data';

    $this->viewBuilder()->setClassName('CsvView.Csv');
    $this->set(compact( 'data','_serialize','_header'));
	 
	 
	 
 }	
 
 
 public function getstates(){
	 	 
	 if($this->request->is('post')){		
		$country=$this->request->data['country'];
		$curl=curl_init();
		curl_setopt($curl,CURLOPT_URL,'https://www.universal-tutorial.com/api/states/'.$country.'');
        $headers = array(
			"Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7InVzZXJfZW1haWwiOiJrcmlzaG5hYWxwaGFrOUBnbWFpbC5jb20iLCJhcGlfdG9rZW4iOiJKbEpkeTI4UXpjV0g3Q2xDZWdvN2dfV2JObkpVWF9WVWtjck5idDVZS2FqT0RsQTNWSWlIcEV2YUlERzc3dmZDbm9RIn0sImV4cCI6MTY5MjMzNDg1OX0.pROf3eAPugPKtwi4v47mNJR5VFhg30QQERf3JuyhShI",
			"Content-Type: application/json");
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);		
			$response = curl_exec($curl);
			curl_close($curl);
			echo $response;
			exit;
	
	 }
	
 }
 
 public function getcities(){
	 
	 if($this->request->is('post')){
		 $state= $this->request->data['state'];
			$curl=curl_init();
		curl_setopt($curl,CURLOPT_URL,'https://www.universal-tutorial.com/api/cities/'.$state.'');
        $headers = array(
			"Authorization: Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjp7InVzZXJfZW1haWwiOiJrcmlzaG5hYWxwaGFrOUBnbWFpbC5jb20iLCJhcGlfdG9rZW4iOiJKbEpkeTI4UXpjV0g3Q2xDZWdvN2dfV2JObkpVWF9WVWtjck5idDVZS2FqT0RsQTNWSWlIcEV2YUlERzc3dmZDbm9RIn0sImV4cCI6MTY5MjMzNDg1OX0.pROf3eAPugPKtwi4v47mNJR5VFhg30QQERf3JuyhShI",
			"Content-Type: application/json");
		curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);		
			$response = curl_exec($curl);
			curl_close($curl);
			echo $response;
			exit;		 
	 }
	 
	 
 }
 
 public function checkingComponent(){	 
	 $result=$this->Math->add(5,4);
	 $sub=$this->Math->subtract(50,25);
	 echo $result;
	 echo $sub;
	 exit;	 
 }
  
	
	
}


?>