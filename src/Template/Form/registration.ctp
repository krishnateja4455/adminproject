<div class='content-wrapper'>

<h1>Form Registration</h1>


<div class='d-flex'>

<div >
<?php echo  $this->Form->create(null,['type'=>'file','url'=>['controller'=>'Form','action'=>'import']]);?>
         <label>Add with excel</label>
		  <?php echo $this->Form->control('csv', ['type'=>'file','class' => '', 'label' => false, 'placeholder' => 'csv upload',]); ?>
		  <br />
		  <input type='submit' value='upload' class='btn btn-success' /><br />
		  <span style='color:red;'>**write headers correctly in excel</span><br />
		  <span style='color:red;'>**all fields mandatory in excel</span><br />
		  <span style='color:red;'>**check in sample download</span><br />
		  
		  
		  </form>	
</div>

<?php echo $this->Html->link('Sample Dowload',$url=['controller'=>'Form','action'=>'sample'],['class'=>'btn btn-primary','style'=>'height:40px;']);?>


</div>

</br>


<?php echo $this->Flash->render();?>

<div class='container'>

<?php echo $this->Form->create(null,['url'=>['controller'=>'Form','action'=>'registration']]);?>


<div class='row'>
<div class="col-md-6">
<div class="form-group">
    <label for='first_name'>FIRST NAME</label>
    <?php echo $this->Form->control("first_name",['placeholder'=>'Enter firstName','label'=>false,'class'=>'form-control'])?>
  </div>
  
  
  <div class="form-group">
  <label for='middle_name'>MIDDLE NAME</label>
    <?php echo $this->Form->control("middle_name",['placeholder'=>'Enter lastName','label'=>false,'class'=>'form-control'])?>
  </div>
  
  <div class="form-group">
  <label for='last_name'>LAST NAME</label>
    <?php echo $this->Form->control("last_name",['placeholder'=>'Enter lastName','label'=>false,'class'=>'form-control'])?>
  </div>
  
  <div class="form-group">
   <label for='passport_number'>PASSPORT NUMBER</label>
	<?php echo $this->Form->control("passport_number",['label'=>false,'class'=>'form-control'])?>
  </div>
  
   <div class="form-group">
                  <label>Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
					
						<?php 
						
						echo $this->Form->control('date_of_birth',['class'=>'form-control datetimepicker-input','data-target'=>'#reservationdate','label'=>false])
						?>
						
                        <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                        </div>
                    </div>
                </div>


</div>

<div class='col-md-6'>

   <div class="form-group">
   <label for='pic'>PASSPORT ISSUED COUNTRY</label>
    <?php $country =['india'=>'India','australia'=>'Australia']?>
	<?php echo $this->Form->select("pic",$country,['empty'=>'select',"class"=>'form-control','id'=>'picId'])?>
  </div>
  <!------------
  <div class="form-group">
   <label for='country'>COUNTRY OF RESIDENCY</label>
    <?php //$country =['india'=>'India','australia'=>'Australia']?>
	<?php //echo $this->Form->select("country",$country,['empty'=>'select',"class"=>'form-control','id'=>'countryId'])?>
  </div>
  --------->
  
  <?php 
  
  $curl=curl_init();
  curl_setopt($curl,CURLOPT_URL,'https://restcountries.com/v3.1/all');
  curl_setopt($curl,CURLOPT_RETURNTRANSFER,true);
  $response=curl_exec($curl);
  curl_close($curl);
  $countries = json_decode($response, true);
  
  $countryNames=array_column($countries,'name','name');
  
  asort($countryNames);
   
  ?>
  <div class='col-md-6'>
   <div class="form-group">
  <label>country</label>
  <select name='country' class='form-control' id='countryAllId'>
  <option>--select one--</option>
  <?php foreach($countryNames as $countryName){ ?>
      <option><?php echo $countryName['common'] ?></option>
  <?php } ?>
 </select>
  </div >
   </div >
  
 
  
 <div class='col-md-6'>
   <div class="form-group">
  <label>State</label>
  <select name='state' class='form-control' id='stateId'>
   <option>--select one--<option> 
   </select>
  </div >
   </div >
   
   
   <div class='col-md-6'>
   <div class="form-group">
  <label>City</label>
  <select name='city' class='form-control' id='cityId'>
   <option>--select one--<option> 
   </select>
  </div >
   </div >
  
  
  
  <div class="form-group">
  <label for='number'>Mobile</label>
    <?php echo $this->Form->control("number",['placeholder'=>'Enter Number','label'=>false,'class'=>'form-control','type'=>'number'])?>
  </div>

  <div class="form-group">
  <label for='email'>Email</label>
    <?php echo $this->Form->control("email",['placeholder'=>'Enter email','label'=>false,'class'=>'form-control'])?>
  </div>
  
  
  <div class="form-group">
   <label for='gender'>Gender</label>
    <?php $gender =['male'=>'Male','female'=>'Female']?>
	<?php echo $this->Form->select("gender",$gender,['empty'=>'select','class'=>'form-control','id'=>'genderId'])?>
  </div><br />
  
  
  <input type="submit" class="btn btn-success pull-right" id='submitBtnId' value="submit">
  
</div>
</div>
</form>
</div>
</div>

<script>

$(document).ready(function(){





/* 
  $.ajax({
     url: "https://www.universal-tutorial.com/api/getaccesstoken",
     method: "GET",
      headers: {
    "Accept": "application/json",
    "api-token": "JlJdy28QzcWH7ClCego7g_WbNnJUX_VUkcrNbt5YKajODlA3VIiHpEvaIDG77vfCnoQ",
    "user-email":"krishnaalphak9@gmail.com"
  },
  success: function(response) {
    // Handle the response
    console.log(response);
  },
  error: function(error) {
    // Handle errors
    console.error("Error:", error);
  }
});

*/








  $('#countryAllId').change(function(){
   
      let country=$(this).val();
	  $.post('<?php echo $this->Url->build(['controller'=>'Form','action'=>'getstates'])?>',{country:country},function(data,status){
	  
	  if(status==='success'){			
			let states=JSON.parse(data);
			console.log(states);
			$('#stateId').html('');
			let html;
			html += "<option>--select one--</option>"
     for(let obj of states){
	    html += "<option>"+obj.state_name+"</option>";
	 
	 }	
	 $('#stateId').append(html);
			
	  }

	  })

  })
  

  $("#stateId").change(function(){
  
     let state=$(this).val();
	 
	 $.post('<?php echo $this->Url->build(['controller'=>'Form','action'=>'getcities'])?>',{state:state},function(data,status){
	 
	   if(status==='success'){
          let cities=JSON.parse(data);  	   
		  $('#cityId').html('');
			let html;
			  html += "<option>--select one--</option>"
			 for(let obj of cities){
				html += "<option>"+obj.city_name+"</option>";	 
			 }	
			 $('#cityId').append(html);
	   } 
	 	 
	 })
	 
  
  })




})


</script>