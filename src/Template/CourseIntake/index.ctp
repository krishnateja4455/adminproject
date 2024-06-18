
<div class='content-wrapper'>


 <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Course Intakes</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <?php echo $this->Html->link('Add','/courseintake/add',['class'=>'btn btn-success float-right ']);?>			
          </div><!-- /.col -->
		
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
	
	
	<div>
	<?php echo $this->Form->create(null,['type'=>'get','url'=>['control'=>'CourseInake','action'=>'index']])?>
	<?php echo $this->Form->control('search',['type'=>'search','label'=>false,'value'=>$this->request->getQuery('search')]);?>
	
	<label for='year'>year</label>
	<?php 
	
	echo $this->Form->select('year',$newYears,['label'=>false,'empty'=>'select one','value'=>$this->request->getQuery('year')])?>
	
	<label for='location'>Location</label>
	<?php 
	
	echo $this->Form->select('location',$newLocations,['label'=>false,'empty'=>'select one','value'=>$this->request->getQuery('location')])?>
	
	<br />
	<button type='submit' class='btn btn-primary'>search</button>
	<a href='<?php echo $this->Url->build(['controller'=>'CourseIntake','action'=>'index'])?>'>Clear Search</a>
	</div>
	<br />

	
<?php echo $this->Flash->render();?>


<table class="table table-bordered ">
<thead>
<tr>
<th>Code</th>
<th>Course Name</th>
<th>Year</th>
<th>Location</th>
<th>Actions</th>
</tr>
</thead>
<tbody>

<?php foreach($intakes as $course){?>
<tr data-id='<?php echo $course['id']?>'>
<td><?= $course['course_code']?></td>
<td><?= $course['course']?></td>
<td><?= $course['year']?></td>
<td><?= $course['location']?></td>

<td><?php echo $this->Html->link("Edit","/CourseIntake/edit/".$course['id'],["class"=>'btn btn-success'])?>

<?php echo $this->Html->link("Delete","/CourseIntake/deleting/".$course['id'],["class"=>'btn btn-danger']) ?>

</td>


</tr>
<?php }?>

</tbody>


</table>






</div>