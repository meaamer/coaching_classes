<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<!-- alertify cdn -->
 <script src="//cdn.jsdelivr.net/alertifyjs/1.9.0/alertify.min.js"></script>
<!-- CSS -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.9.0/css/alertify.min.css"/>
<!-- Default theme -->
<link rel="stylesheet" href="//cdn.jsdelivr.net/alertifyjs/1.9.0/css/themes/default.min.css"/>
<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Courses Table</h3>
					 <div class="xs tabls">
						
					   <button type="button" class="btn-success"  data-toggle="modal" data-target="#myModal"><?php if (isset($rows)) {echo "Update Course";
                         }else{echo "Add Course";} ?></button>
						
						<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">

							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											<th>#</th>
											<th>Course Name</th>
                      <th>Course Fees</th>
											<th>Actions</th>
											
										</tr>
									</thead>
									<tbody>
									<?php if (!empty($list)) {

											foreach ($list as $item){?>
											
									
										<tr id="reload<?php echo $item['course_id']; ?>">
											<td><?php echo $item['course_id']; ?></td>
											<td><?php echo $item['course_name']; ?></td>
                      <td><?php echo $item['course_fees']; ?></td>
											<td> 
												<button type="button" class="btn btn-danger btn-xs" onclick="DeleteCourse(<?=$item['course_id']?>);">Delete</button>

  												<a class="btn btn-primary btn-xs" 
                                     		href="<?=base_url('CourseTable/CourseList/').$item['course_id']?>">Update</a>
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
		
<div class="modal fade" tabindex="-1" role="dialog" id="myModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Modal title</h4>
      </div>
      <div class="modal-body">
        <form id="send">
  			<div class="form-group has-success">
  			<label class="sr-only" for="inlineFormInput">Course Name</label>
 				<input class="form-control form-control-lg" type="text" placeholder="Course Name" name="send_course" value="<?php if(isset($rows)){echo $rows['course_name']; } ?>">
  			</div>
        <div class="form-group has-success">
        <label class="sr-only" for="inlineFormInput">Course Fees</label>
        <input class="form-control form-control-lg" type="text" placeholder="Course Fees" name="send_fees" value="<?php if(isset($rows)){echo $rows['course_name']; } ?>">
        </div>

  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <?php if (isset($rows)) { ?>

           <button type="button" class="btn btn-default" onclick="UpdateCourse(<?=$rows['course_id']?>);">Update</button> 
           

          <?php } else { ?>
        	<button type="button" class="btn btn-primary" onclick="AddCourse()">Submit</button>
                      
         <?php  } ?>
        

         
                                

            

        <div id="alerts"></div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->		

<script>
function AddCourse()
  {
    var form =$("#send");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>CourseTable/InserCourse",
      data:form.serialize(),
      success: function(response){
        $("#alerts").html(response);
         form[0].reset();
      }
    });
  }


  function DeleteCourse(id){
   
    alertify.confirm("Sure You Want To Delete This.",function(){
      $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>CourseTable/DropCourse/"+id,
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

function UpdateCourse(id)
  {
   
    var form =$("#send");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>CourseTable/ChangeCourse/"+id,
      data:form.serialize(),
      success: function(response){
        $("#alerts").html(response);
      }
    });
  }
</script>


