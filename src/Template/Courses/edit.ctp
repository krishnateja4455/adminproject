
<div class="content-wrapper">

<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                   <h1 class="box-title">Course Edit</h1>
			<!----------	   
            <?php echo $this->Form->create(null,['url'=>['controller'=>'Courses','action'=>'add'],'type'=>'file']) ?>
			  ---------->
			  <form enctype='multipart/form-data' id='editCourseId'>
			  
			    
                  <div class="box-body">
				  
				  <input type='hidden' name='id' id='courseId'/>
                   <label for="exampleInputtype">code</label>

                   <?php $code=['BITS'=>'BITS','MBA'=>'MBA','MITS'=>'MITS'];
				   
				   echo $this->Form->select('code',$code,['class'=>'form-control','id'=>'codeId']); ?>


                  <label for="nameId">Name</label>
				  
				  
				   <?php $name=['Bachelor of Information Technology and Systems(BITS)'=>'Bachelor of Information Technology and Systems(BITS)','Masters of Business Administration(MBA)'=>'Masters of Business Administration(MBA)','Masters of Information Technology and Systems(MITS)'=>'Masters of Information Technology and Systems(MITS)'];
				   
				   echo $this->Form->select('name',$name,['class'=>'form-control']); ?>

                 

                    <label for="exampleInputtype">Course Type</label>
					
					<?php $type=['Online'=>'Online','Offine'=>'Offine'];
				   
				   echo $this->Form->select('course_type',$type,['class'=>'form-control','id'=>'typeId']); ?>

                    

                     <div class="form-group">

                      <label for="number">Fee</label>

                      <?php echo $this->Form->control('fee',['type'=>'number','class'=>'form-control','label'=>false])?>
                     

                    </div>

                    <div class="form-group">
                      <label for="duration">Duration</label>					  
					  <?php echo $this->Form->control('duration',['class'=>'form-control','label'=>false])?>
                    </div>
                    <div class="form-group">
                      <label for="credit">Credit Point</label>
                     <?php echo $this->Form->control('credit',['class'=>'form-control','label'=>false,'type'=>'number'])?>
                 </div>
                  
                       <label for="active" class="form-label">active</label>
					   
					   
					   <?php $active=['Yes'=>'Yes','No'=>'No'];
				   
				   echo $this->Form->select('active',$active,['empty'=>'select','class'=>'form-control','id'=>'activeId']); ?>
					 
					 <!-----------
					   <div class="mb-3">
                        <label for="file" class="form-label">Image</label>	
						<?php  echo $this->Form->control('file',['type'=>'file','class'=>'form-control','label'=>false])?>

                       </div>
					   ----------->

                        <div class="form-group">

                      <label for="desc">Description</label>
                      <textarea  class="form-control textarea" id="desc" name="description"></textarea>

                    </div>                                   

                     
					  
					  
					  
					  <div class="form-group">
                  <label>Modified Date</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
					
						<?php 
						
						echo $this->Form->control('modified_date',['class'=>'form-control datetimepicker-input','data-target'=>'#reservationdate','label'=>false,'id'=>'dateId'])
						?>
						
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
		
                     <div class="form-group">

                      <label for="modified_by">Modified BY</label>
					  
					  <?php echo $this->Form->control('modified_by',['class'=>'form-control','label'=>false])?>
       
                    </div>
                     </div><!-- /.box-body -->

                  <div class="box-footer">

                    <input type="button" id='editSaveId' class="btn btn-success" value="Save">

                  </div>
				  
                </form>

               </div>

              </div>

            </div>

           </div>

          </section>

         </div>
		 
		 
        <script type="text/javascript">
        $(document).ready(function(){
		
		$('.textarea').summernote();
		
		//$("#file").change(function(e){	
			//	console.log(e.target.files);
			//});
			
			
		$.ajax({		
					type: "GET",
					url: "<?php echo $this->Url->build(['controller'=>'Courses','action'=>'getting']).'/'.$_GET['id']; ?>",
					dataType:"json",
					cache: false,
					success: function(data){
					//console.log(data);
					$('#courseId').val(data['id'])
					$("#codeId").val(data['code']);
					$("#name").val(data['name']);
					$("#typeId").val(data['course_type']);
					$("#fee").val(data['fee']);
					$("#duration").val(data['duration']);
					$("#credit").val(data['credit']);
					$("#activeId").val(data['active']);
					$('#desc').summernote('insertText',data['description']);
					
					
					}		
		
		});
			
		
		$("#editSaveId").click(function(){		
		var $form = $('#editCourseId');
        var UserData = $form.serialize();
		console.log(UserData);
		
		           		
		
		  $.ajax({
					type: "POST",
					url: "<?php echo $this->Url->build(['controller'=>'Courses','action'=>'update'])?>",
					data: UserData,
					cache: false,
					success: function(data){
					alert('Course Updated Successfully');
					window.location.href="<?php echo $this->Url->build(['controller'=>'Courses','action'=>'index'])?>";
					
					
					return false;

					}
        });
		
	
		})
		
		})
           </script>
		   
		  

                                                 