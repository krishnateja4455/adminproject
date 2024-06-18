
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Course Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <?php echo $this->Html->link('Add Course','/courses/add',['class'=>'btn btn-success float-right ']);?>			
          </div><!-- /.col -->
		
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	  <?php echo $this->Flash->render();?>

	<table class="table table-bordered ">
<thead>
<tr>
<th>Code</th>
<th>Name</th>
<th>Course Type</th>
<th>Fee</th>
<th>Duration</th>
<th>Credit</th>
<th>Active</th>
<th>Created_date</th>
<th>Created_by</th>
<th>Actions</th>
</tr>
</thead>
<tbody>

<?php foreach($data as $course){?>
<tr data-id='<?php echo $course['id']?>'>
<td><?= $course['code']?></td>
<td><?= $course['name']?></td>
<td><?= $course['course_type']?></td>
<td><?= $course['fee']?></td>
<td><?= $course['duration']?></td>
<td><?= $course['credit']?></td>
<td><?= $course['active']?></td>
<td><?= $course['created_date']?></td>
<td><?= $course['created_by']?></td>

<td><?php echo $this->Html->link("Edit","/Courses/edit?id=".$course['id'],["class"=>'btn btn-success edit'])?>

<?php echo $this->Html->link("Delete","/Courses/deleting/".$course['id'],["class"=>'btn btn-danger']) ?>

</td>


</tr>
<?php }?>

</tbody>


</table>
	  
  </div>
  <!-- /.content-wrapper -->
<!-----------  
<script>

$(document).ready(function(){


$(".edit").click(function(){

let id=$(this).parent().parent().data('id');
//alert(id);


          $.ajax({
					type: "GET",
					url: "<?php echo $this->Url->build(['controller'=>'Courses','action'=>'edit/'])?>"+id,
					data: {},
					cache: false,
					success: function(data){
					alert(data);
					return false;

					}
        });



})

})

</script>
----------->
  