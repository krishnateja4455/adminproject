


<div class='content-wrapper'>

<h1>Edit</h1>

<div class='container'>
<?php echo $this->Form->create(null,['url'=>['controller'=>'Form','action'=>'edit']]);?>
<input type="hidden" value=<?php echo $data['id'] ?> name="id" />
<div class='row'>
<div class="col-md-6">
<div class="form-group">
    <label for='first_name'>FIRST NAME</label>
    <?php echo $this->Form->control("first_name",['placeholder'=>'Enter firstName','label'=>false,'class'=>'form-control', 'value'=>$data['first_name']])?>
  </div>
  
  
  <div class="form-group">
  <label for='middle_name'>MIDDLE NAME</label>
    <?php echo $this->Form->control("middle_name",['placeholder'=>'Enter lastName','label'=>false,'class'=>'form-control','value'=>$data['middle_name']])?>
  </div>
  
  <div class="form-group">
  <label for='last_name'>LAST NAME</label>
    <?php echo $this->Form->control("last_name",['placeholder'=>'Enter lastName','label'=>false,'class'=>'form-control','value'=>$data['last_name']])?>
  </div>
  
  <div class="form-group">
   <label for='passport_number'>PASSPORT NUMBER</label>
	<?php echo $this->Form->control("passport_number",['label'=>false,'class'=>'form-control','value'=>$data['passport_number']])?>
  </div>
  
   <div class="form-group">
                  <label>Date:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
					
						<?php 
						
						echo $this->Form->control('date_of_birth',['class'=>'form-control datetimepicker-input','data-target'=>'#reservationdate','label'=>false,'value'=>$data['date_of_birth']])
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
	<?php echo $this->Form->select("pic",$country,['default'=>$data['pic'],"class"=>'form-control'])?>
  </div>
  
  <div class="form-group">
   <label for='country'>COUNTRY OF RESIDENCY</label>
    <?php $country =['india'=>'India','australia'=>'Australia']?>
	<?php echo $this->Form->select("country",$country,['default'=>$data['country'],"class"=>'form-control'])?>
  </div>

  <div class="form-group">
  <label for='number'>Mobile</label>
    <?php echo $this->Form->control("number",['placeholder'=>'Enter Number','label'=>false,'class'=>'form-control','type'=>'number','value'=>$data['number']])?>
  </div>

  <div class="form-group">
  <label for='email'>Email</label>
    <?php echo $this->Form->control("email",['placeholder'=>'Enter email','label'=>false,'class'=>'form-control','value'=>$data['email']])?>
  </div>
  
  
  <div class="form-group">
   <label for='gender'>Gender</label>
    <?php $gender =['male'=>'Male','female'=>'Female']?>
	<?php echo $this->Form->select("gender",$gender,['default'=>$data['gender'],'class'=>'form-control'])?>
  </div><br />
  
  <input type="submit" class="btn btn-success pull-right" value="save">
</div>
</div>
</form>
</div>
</div>

