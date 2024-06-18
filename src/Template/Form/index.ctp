
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Student Details</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <?php echo $this->Html->link('Add Student','/registration',['class'=>'btn btn-success float-right ']);?>			
						
          </div><!-- /.col -->
		
		
		
		  
		  
		
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
	  <?php echo $this->Flash->render();?>
	
	<table class="table table-bordered ">
<thead>
<tr>
<th>First Name</th>
<th>Middle Name</th>
<th>Last Name</th>
<th>Passport Number</th>
<th>Country</th>
<th>Number</th>
<th>DOB</th>
<th>Email</th>
<th>Actions</th>
</tr>
</thead>
<tbody>

<?php foreach($data as $user){?>
<tr>
<td><?= $user['first_name']?></td>
<td><?= $user['middle_name']?></td>
<td><?= $user['last_name']?></td>
<td><?= $user['passport_number']?></td>
<td><?= ucfirst($user['country'])?></td>
<td><?= $user['number']?></td>
<td><?= $user['date_of_birth']?></td>
<td><?= $user['email']?></td>
<td><?php echo $this->Html->link("Edit","/Form/edit/".$user['id'],["class"=>'btn btn-success'])?>

<?php echo $this->Html->link("Delete","/Form/deleting/".$user['id'],["class"=>'btn btn-danger']) ?>

</td>


</tr>
<?php }?>

</tbody>


</table>
	
	
	
<?= $this->Html->link('Download in Excel', ['action' => 'csv'],['class'=>'btn btn-primary']) ?>
   
  </div>
  <!-- /.content-wrapper -->
  


  