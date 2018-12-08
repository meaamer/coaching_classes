
<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">City Table</h3>
					 <div class="xs tabls">
						
					   <button type="button" class="btn btn-danger"  data-toggle="modal" data-target="#myModal"><?php if (isset($rows)) {echo "Update City";
                         }else{echo "Add City";} ?></button>
						
						<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">

							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											<th>#</th>
											<th>City Name</th>
											<th>Actions</th>
											
										</tr>
									</thead>
									<tbody>
									<?php if (!empty($list)) {

											foreach ($list as $item){?>
											
									
										<tr id="reload<?php echo $item['city_id']; ?>">
											<td><?php echo $item['city_id']; ?></td>
											<td><?php echo $item['city_name']; ?></td>
											<td> 
												<button type="button" class="btn btn-danger btn-xs" onclick="DeleteCity(<?=$item['city_id']?>);"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:18px"></i></button>

  												<a class="btn btn-danger btn-xs" 
                                     		href="<?=base_url('City/CityList/').$item['city_id']?>"><i class="fa fa-pencil" aria-hidden="true" style="font-size:18px"></i></a>
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
  			<label class="sr-only" for="inlineFormInput">City Name</label>
 				<input class="form-control form-control-lg" type="text" placeholder="City Name" name="send_city" value="<?php if(isset($rows)){echo $rows['city_name']; } ?>">
  			</div>

  

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
         <?php if (isset($rows)) { ?>

           <button type="button" class="btn btn-default" onclick="UpdateCity(<?=$rows['city_id']?>);">Update</button> 
           

          <?php } else { ?>
        	<button type="button" class="btn btn-primary" onclick="AddCity()">Submit</button>
                      
         <?php  } ?>
        

         
                                

            

        <div id="alerts"></div>
        </form>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->		

<script>
function AddCity()
  {
    var form =$("#send");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>City/InserCity",
      data:form.serialize(),
      success: function(response){
        $("#alerts").html(response);
         form[0].reset();
      }
    });
  }


  function DeleteCity(id){
   
    alertify.confirm("Sure You Want To Delete This.",function(){
      $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>City/DropCity/"+id,
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

function UpdateCity(id)
  {
   
    var form =$("#send");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>City/ChangeCity/"+id,
      data:form.serialize(),
      success: function(response){
        $("#alerts").html(response);
      }
    });
  }
</script>


