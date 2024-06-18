
<div class='content-wrapper'>

<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                   <h1 class="box-title">Course Intake Add</h1>
				   
				   
  			   
				   
				   

<?php echo $this->Flash->render();?>
<?php echo $this->Form->create(null,['url'=>['controller'=>'CourseIntake','action'=>'add']]) ?>

<label for='course'>Course</label>

<?php echo $this->Form->select('course',$courses,['class'=>'form-control','empty'=>'select one','id'=>'courseId']);?>



<label for='course_code'>Course Code</label>
<?php echo $this->Form->control('course_code',['class'=>'form-control','label'=>false,'id'=>'course_code']) ?>

<label for='year'>Year</label>

<?php 
$year=['2023'=>'2023','2024'=>'2024','2025'=>'2025','2026'=>'2026'];

echo $this->Form->select('year',$year,['empty'=>'select','class'=>'form-control','id'=>'year']) ?>


<label for='location'>Location</label>
<?php 
$location=['sydney'=>'sydney','melbourne'=>'melbourne','adelaide'=>'adelaide'];

echo $this->Form->select('location',$location,['empty'=>'select','class'=>'form-control','id'=>'location']) ?>


<button type='submit' class='btn btn-primary'>submit</button>
 </div>

 </div>

 </div>

 </div>

 </section>

</div>

<script>

$(document).ready(function(){

$('#courseId').change(function(){

let course=$(this).val();

$.post('<?php echo $this->Url->build(['controller'=>'CourseIntake','action'=>'getting']);?>',{course:course},function(data,status){

if(status=='success'){

let jsn=JSON.parse(data)

$("#course_code").val(jsn[0]['code']);

}

});




})

})

</script>