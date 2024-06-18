
<div class="content-wrapper">

<section class="content">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- general form elements -->
              <div class="box box-primary">
                <div class="box-header with-border">
                   <h1 class="box-title">Course Add</h1>
			<!----------	   
            <?php echo $this->Form->create(null,['url'=>['controller'=>'Courses','action'=>'add'],'type'=>'file']) ?>
			  ---------->
			  <form enctype='multipart/form-data' id='courseId'>
			  
			 
                  <div class="box-body">
                   <label for="code">code</label>

                   <?php 
				   
				   echo $this->Form->control('code',['class'=>'form-control','label'=>false]); ?>
				   <span id='codeErr' style='color:red;'></span><br />

                  <label for="name">Name</label>
				  
				  
				   <?php $name=['Bachelor of Information Technology and Systems(BITS)'=>'Bachelor of Information Technology and Systems(BITS)','Masters of Business Administration(MBA)'=>'Masters of Business Administration(MBA)','Masters of Information Technology and Systems(MITS)'=>'Masters of Information Technology and Systems(MITS)','Adobe Photoshop'=>'Adobe Photoshop'];
				   
				   echo $this->Form->select('name',$name,['empty'=>'select','class'=>'form-control']); ?>

                 

                    <label for="exampleInputtype">Course Type</label>
					
					<?php $type=['Online'=>'Online','Offine'=>'Offine'];
				   
				   echo $this->Form->select('course_type',$type,['empty'=>'select','class'=>'form-control']); ?>

                    

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
	
                 <div>
				 <h3>Measures</h3>
				 
				 <table class='table table-bordered'>
				 <thead>
				 <th>Measure Type</th>
				 <th>Value</th>
				 <th>select</th>
				 <th>delete</th>				 
				 </thead>
				 
				 <tbody id='bodyId'>
				
				 
				 </tbody>
					<tr >
						<td >
							<select class='form-control measure' id='optionId'>
							<option >--select--</option>
							</select>
						</td>
						<td>
							<input type='text'  id='valId' />				 
						</td>
						<td></td>
						<td>
							<button class='btn btn-primary addbtn' type='button'>+</button>
						</td>
					</tr>				 
				 </table>
				 
				 				 
				 </div>	
		 
                  
                       <label for="active" class="form-label">active</label>
					   
					   
					   <?php $active=['Yes'=>'Yes','No'=>'No'];
				   
				   echo $this->Form->select('active',$active,['empty'=>'select','class'=>'form-control']); ?>
					   
					   <div class="mb-3">

                        <label for="file" class="form-label">Image</label>
						
						<?php  echo $this->Form->control('image',['type'=>'file','class'=>'form-control','label'=>false])?>

                     

                       </div>

                        <div class="form-group">

                      <label for="desc">Description</label>
                      <textarea  class="form-control textarea"  id="desc" name="description"></textarea>

                    </div>                                   

                     
					  
					  
					  
					  <div class="form-group">
                  <label>Created Date</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
					
						<?php 
						
						echo $this->Form->control('created_date',['class'=>'form-control datetimepicker-input','data-target'=>'#reservationdate','label'=>false])
						?>
						
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>
		
                     <div class="form-group">

                      <label for="CB">Created BY</label>
					  
					  <?php echo $this->Form->control('created_by',['class'=>'form-control','label'=>false])?>
       
                    </div>
                     </div><!-- /.box-body -->

                  <div class="box-footer">

                    <input type="button" id='btnId' class="btn btn-primary" value="Submit">

                  </div>
				  <span id='formErr' style='color:red;'></span>
				  
                </form>

               </div>

              </div>

            </div>

           </div>

          </section>

         </div>
		 
		
        <script type="text/javascript">
        $(document).ready(function(){
		
		$('.textarea').summernote()
	
		$("#btnId").click(function(){				
		$codeMsg=$("#codeErr").text();		
		if($codeMsg==''){		
		var newdata = new FormData($("#courseId")[0]);
	
	   // var formData = $('#courseId').serialize();
       //console.log(formData);
	   //return false;
	   
		  $.ajax({
					type: "POST",
					url: "<?php echo $this->Url->build(['controller'=>'Courses','action'=>'add'])?>",
					data: newdata,
					processData: false,
                    contentType: false,
					cache: false,
					success: function(data){
					if(data==='success'){
					alert('Course Added successfully');
					window.location.href="<?php echo $this->Url->build(['controller'=>'Courses','action'=>'index'])?>"
					return false;
                    }else{
					 alert('error occured while adding');
					 return false;
					  }
					}
        });
		}else{
			$("#formErr").text('required all fields');		
		}		
		});
		
		
		
		$('#code').change(function(event){		
			let codeData=event.target.value
			//console.log(codeData);
			$.post('<?php echo $this->Url->build(['controller'=>'Courses','action'=>'checking'])?>',{code:codeData},function(data,status){
			
			if(status=='success'){	
			if(data=='yes'){
				$("#codeErr").text('');
			}else{
			$("#codeErr").text('Code Already exits');
			}
			}
			})		
		})
		
		
		let valArr=[]

		let options=[
		{key:'Attended Hours',value:'AH'},
		{key:'Delivery Hours',value:'DH'},
		{key:'Nominal Hours',value:'NH'},
		{key:'PUSH Hours',value:'PH'},
		{key:'Schedule Hours',value:'SH'}			
		]
		
		function renderOptions(){
		
		let selectHtml=''	
        selectHtml+='<option>--select--</option>'		
		   for( let obj of options){	
           if(!valArr.includes(obj.key)){		
		   selectHtml += '<option val='+obj.value+'>'+obj.key+'</option>'
		   }
		}
		$('#optionId').html(selectHtml);
		
		}
		renderOptions()
	
		
		$('.addbtn').click(function(){	       
         let value=$('#optionId').val();
		 let inputValue=$('#valId').val();
        let html=`		
			<tr>
		<td>
		<select name='mesure' class='form-control' id='type' readonly>		
		   <option>'`+value+`'</option>
		</select>
		</td>
		<td><input type='text' name='val' ></td>
		<td><input type='radio' name='measure'></td>
		<td><input type='button' class='btn btn-primary delBtn' value='del'></td></tr>`;
		valArr.push(value);
		$('#bodyId').append(html);
		renderOptions();
		
})


		$('body').on('click','.delBtn',function(){	
	
             let word=$(this).parent().siblings().first().children().val();
			let newArr=[];
            for(let value of valArr){
			  if(value!==word){
			     newArr.push(value)
			  }
			}
			valArr=newArr;
            renderOptions();
            $(this).closest('tr').remove()			
			 			 
		})
		
		
		
		})
           </script>
		   
		  

                                                 