<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Student Tables</h3>
					 <div class="xs tabls">
           <div class="row">
           <div class="col-md-2">
						 <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#myModal"><?php if (isset($rows)) {echo "Update Student";
                         }else{echo "Add Student";} ?></button></div>
 <div class="col-md-4">                        
<form class="form-inline" id="search_it">
  <div class="form-group">
    <input type="text" class="form-control" name="std_search" placeholder="Search">
  </div>
  <button type="button" class="btn btn-default" onclick="SearchResult();">Search</button>
  <div id="print_search"></div>

</form>
  
</div>
  <div class="col-md-6">
  <form class="form-inline" id="sort_it">
  <div class="form-group">
    
    <input type="date" class="form-control" name="from_date" required>
  </div>
  <div class="form-group">
    
    <input type="date" class="form-control" name="to_date" required>
  </div>
  <button type="button" class="btn btn-default" onclick="DateSort();">Sort</button>
  <div id="select"></div>
</form>
  </div>
  
  
					</div>   
						
						<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
							
							<div class="panel-body no-padding" style="display: block;" >
								<table class="table table-striped" >
									<thead>
										<tr class="warning">
											<th>#</th>
											<th>Image</th>
											<th>Full Name</th>
											<th>Mobile NO</th>
											
											<th>Course</th>
											<th>Sub Course</th>
                      <th>Status</th>
                      <th>Actions</th>
										</tr>
									</thead>
											
											
											
											
											
									<tbody id="search_date">
										
										<?php if (!empty($list)) { foreach ($list as $item) {?>
										<tr id="reload<?php echo $item['std_id']; ?>">
											<td><?php echo $item['std_id']; ?></td>
											<td><img src="<?php echo base_url($item['std_image']); ?>" class="img-responsive" height="100" width="100"></td>
											<td><?php echo $item['std_full_name']; ?></td>
											
											
											<td><?php echo $item['std_mobile']; ?></td>
											
											<td><?php echo $item['std_course']; ?></td>
											<td><?php echo $item['std_sub_course']; ?></td>
                      <td>
                      <?php if($item['status']==0){
                        echo '<button type="button" class="btn btn-danger btn-xs" 
                      onclick="Status('.$item['std_id'].',1);">Active</button></td>';
                      }else{
                        echo '<button type="button" class="btn btn-danger btn-xs" 
                      onclick="Status('.$item['std_id'].',0);">Deactive</button></td>';
                      }
                      ?>
											
											<td> 
											<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#student_details" onclick="ViewItem(<?=$item['std_id']?>)"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size:25px"></i></button>
												<button type="button" class="btn btn-danger btn-xs" onclick="DeleteStd(<?=$item['std_id']?>);"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:25px"></i></button>

  												<a class="btn btn-danger btn-xs" 
                          href="<?=base_url('Student/StudentList/').$item['std_id']?>"><i class="fa fa-pencil" aria-hidden="true" style="font-size:25px"></i>
</a>
											</td>

											
										</tr>
										<?php } } ?>
									</tbody>
                </table>



							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>




<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="myModal">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<div class="modal-header bg-success" style="background:#ffffff; color: #b5b0b0;">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel"><?php if (isset($rows)){ echo"Update Addmission Form"; }else { echo "Addmission Form";}?></h4>
      </div>
     	<div class="modal-body">

        	<form id="frmsend" enctype="multipart/form-data" method="POST" role="from">
<div class="row">
  <div class="form-group col-md-6">
    <label >Full Name</label>
    <input type="text" class="form-control input-sm" id="" placeholder="Full Name" name="full_name"
    value="<?php if(isset($rows)){echo $rows['std_full_name']; } ?>" required="">
  </div>
  <div class="form-group col-md-6">
    <label >Mother Name</label>
   <input type="text" class="form-control input-sm" id="" placeholder="Mother Name" name="mother_name"
   value="<?php if(isset($rows)){echo $rows['std_mother_name']; } ?>" required>
  </div>
 </div>
 <div class="row"> 
  <div class="form-group col-md-3">
    <label >Date Of Birth</label>
    <input type="date" class="form-control input-sm" id=""  name="dob"
    value="<?php if(isset($rows)){echo $rows['std_dob']; } ?>" required>
  </div>

  <!-- gender lable -->
  <div class="form-group col-md-3">
 
      <div style="margin-top: 24px">
    
      <label class="radio-inline"><input type="radio" name="gender" 
      value="male" <?php if(isset($rows)){echo ($rows['std_gender']=='male')? 'checked="checked"':'' ;} ?>>Male</label required>
   
      <label class="radio-inline"><input type="radio" name="gender" 
      value="famale" <?php if(isset($rows)){echo ($rows['std_gender']=='female')? 'checked="checked"':'';}?> required>Female</label>
     
    </div>
    
  </div>
  <div class="form-group col-md-6">
    <label >Password</label>
    <input type="text" class="form-control input-sm" placeholder="Password" name="password"
    value="<?php if(isset($rows)){echo $rows['std_password']; } ?>" >
  </div>
  </div>
  <div class="row">
  <div class="form-group col-md-6">
    <label >Mobile</label>
    <input type="text" class="form-control input-sm" id="" placeholder="Mobile No" name="mnumber"
    value="<?php if(isset($rows)){echo $rows['std_mobile']; } ?>" required>
  </div>
  <div class="form-group col-md-6">
    <label >Email ID</label>
    <input type="email" class="form-control input-sm" id="" placeholder="Email Id" name="email"
    value="<?php if(isset($rows)){echo $rows['std_email']; } ?>" required>
  </div>
  </div>
<div class="row">
  
  <div class="form-group col-md-6">
    <label >Course</label>
     <select class="form-control input-sm" name="course" required>
      <?php if(!empty($course)){ foreach ($course as $course_list){ ?>
              
             <option value="<?php echo $course_list['course_name'];?>"
              <?php if(isset($rows)){
              if($rows['std_course']==$course_list['course_name']){echo "selected";}}?>
             >
              <?php echo $course_list['course_name'];  ?></option>
          
      <?php } } ?>
     </select>
  
    <label >Sub Course</label>
    <input type="text" class="form-control input-sm" id="" placeholder="Sub Course" name="subcourse"
    value="<?php if(isset($rows)){echo $rows['std_sub_course']; } ?>" required>
  </div>
  <div class="form-group col-md-6">

  <label >Course Fees</label>
     <select class="form-control input-sm" name="fees" required>
      <?php if(!empty($course)){ foreach ($course as $course_list){ ?>
              
             <option value="<?php echo $course_list['course_fees'];?>"
              <?php if(isset($rows)){
              if($rows['std_fees']==$course_list['course_fees']){echo "selected";}}?> 
             >
              <?php echo $course_list['course_fees'];  ?></option>
          
      <?php } } ?>
     </select>
    <label >Education</label>
     <textarea class="form-control input-sm" rows="1" name="education"
     value="" required><?php if(isset($rows)){echo $rows['std_address']; } ?></textarea>


  </div>
  </div>
  <div class="row">
  <div class="form-group col-md-6">
   
    <input type="file" name="photo" required>
    
  </div>
  <div class="form-group col-md-6">
    <label >Date of Addmission</label>
    <input type="date" class="form-control input-sm" id=""  name="addmission"
    value="<?php if(isset($rows)){echo $rows['std_addmission_date']; } ?>" required>
  </div>
  </div>
  <div class="row">
   <div class="form-group col-md-6">
    <label >State</label>
     
      <select class="form-control input-sm" name="state" required>
      <?php if(!empty($state)){ foreach ($state as $state_list){ ?>
              
             <option value="<?php echo $state_list['state_name'];?>" 
              <?php if(isset($rows)){
              if($rows['std_state']==$state_list['state_name']){echo "selected";}}?> >
              
            
              <?php echo $state_list['state_name'];  ?></option>
          
      <?php } } ?>
     </select>
  
    <label >City</label>
     <select class="form-control input-sm" name="city" required>
      <?php if(!empty($city)){ foreach ($city as $city_list){ ?>
              
             <option value="<?php echo $city_list['city_name'];?>"


              <?php if(isset($rows)){
              if($rows['std_city']==$city_list['city_name']){echo "selected";}}?> >
              <?php echo $city_list['city_name'];  ?>
                

              </option>
          
      <?php } } ?>
     </select>
  </div>
  <div class="form-group col-md-6">
    <label >Address</label>
     <textarea class="form-control input-sm" rows="4" name="address"
     value="" required><?php if(isset($rows)){echo $rows['std_address']; } ?></textarea>
  </div>
  </div>
  
   
  
  
  
  
  

      	</div>
      <div class="modal-footer bg-success" style="background:rgba(218, 212, 212, 0.15);">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        
        <?php if (isset($rows)) { ?>

           <button type="button" class="btn btn-danger" onclick="UpdateStudent(<?=$rows['std_id']?>);">Update</button> 
           

          <?php } else { ?>
          <button type="button" class="btn btn-danger" onclick="AddStd()">Save</button>
                      
         <?php  } ?>
        <div id="alert"></div>
        </form>
      </div>
       
    </div>
  </div>
</div>



<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="student_details">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header bg-success">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="gridSystemModalLabel">Register</h4>
      </div><br>
     <div id="print"></div>
     <div class="modal-footer bg-success">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       
      </div>

    </div>
  </div>
</div>

<script>
function ViewItem(id)
{
  var BASE_URL = "<?php echo base_url();?>";
   $.post("<?php echo base_url()?>Student/DetailView/"+id,
    function(data){
    
   $("#print").html(data);

   });
   
 }



function DeleteStd(id){
	//alert(id);
   
    alertify.confirm("Sure You Want To Delete This.",function(){
      $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Student/DeleteStudent/"+id,
      success: function(response){
       alertify.success(response);
        $('#reload'+id).remove();
      }
  });
   },
  function(){
    alertify.error('Cancel');
  })

}


function AddStd(){
	
	if (typeof FormData !== 'undefined') {
        var formData = new FormData( $("#frmsend")[0] );
        $.ajax({
            url :'<?php echo base_url();?>Student/InserStudent',  // Controller URL
            type : 'POST',
            data : formData,
            async : false,
            cache : false,
            contentType : false,
            processData : false, 
		    success: function(data) {
		    //$('#alert').html(data);	
		    alertify.success(data); 
		        form[0].reset();

            
           
           
		    },
        });

    } 
    
}

function UpdateStudent(id){
  
  if (typeof FormData !== 'undefined') {
        var formData = new FormData( $("#frmsend")[0] );
        $.ajax({
            url:"<?php echo base_url()?>Student/ChangeStudent/"+id,  // Controller URL
            type : 'POST',
            data : formData,
            async : false,
            cache : false,
            contentType : false,
            processData : false, 
        success: function(data) {
        //$('#alert').html(data); 
        alertify.success(data);    
            
           
         
          // location.reload();
           
        },
        });

    } 
    
}

function SearchResult()
{
    var form =$("#search_it");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Student/SearchStd",
      data:form.serialize(),
      success: function(data)
      {
        $("#search_date").html(data);
      }
});
}

  function Status(id,status)
  {

  $.ajax({
            type : 'POST',
            url :'<?php echo base_url();?>Student/UpdateStatus/'+id+'/'+status,
            success: function(response){
              location.reload();
            }  
            
        });
  }
function DateSort()
{
    var form =$("#sort_it");
    $.ajax({
    type:"POST",
    url:"<?php echo base_url()?>Student/DateSorting",
    data:form.serialize(),
    success: function(data)
    {
      $("#search_date").html(data);
    }
});
}
            

            
           
           
 
  
</script>
   
     



  




<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>