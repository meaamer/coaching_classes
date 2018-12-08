


<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">
	
			<div id="page-wrapper">
				<div class="graphs">
					<h3 class="blank1">Fees Table</h3>
					 <div class="xs tabls">
						
					   
						
						<div class="panel panel-warning" data-widget="{&quot;draggable&quot;: &quot;false&quot;}" data-widget-static="">

							<div class="panel-body no-padding" style="display: block;">
								<table class="table table-striped">
									<thead>
										<tr class="warning">
											<th>#</th>
                      <th>Date</th>
                      <th>Image</th>
                       
											<th>Student Name</th>
                      <th>Receive Amount</th>
                      <th>Balance Amount</th>
											<th>Actions</th>
                      
											
										</tr>
									</thead>
									<tbody>
									<?php if (!empty($list)) {

											foreach ($list as $item){?>
											
									
										<tr id="reload<?php echo $item['std_id']; ?>">
											<td><?php echo $item['std_id']; ?></td>
                      <td><?php echo $item['date']; ?></td>
                     <td><img src="<?php echo base_url($item['std_image']); ?>" class="img-responsive" height="100" width="100"></td>
                      
											<td><?php echo $item['std_full_name']; ?></td>
                      <td><?php echo $item['TotalDebit']; ?>/-</td>
                      <td><?php echo $item['TotalCredit'] - $item['TotalDebit']; ?>/-<br>
                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#balance" onclick="BalanceFees(<?=$item['std_id']?>)">Balance Fees</button>
                      </td>
											<td> 
                      
												<button type="button" class="btn btn-danger btn-xs" onclick="DeleteFees(<?=$item['std_id']?>);">Delete</button>

  								        <button type="button" class="btn btn-danger btn-xs"  data-toggle="modal" data-target="#myModal" onclick="FeesHistory(<?=$item['std_id']?>)">History</button>
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
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><br>

       
      </div>
      <div class="modal-body">
       
       <div id="print"></div>
       

  

      </div>
      <div class="modal-footer">
                    

            

        
       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<div class="modal fade" tabindex="-1" role="dialog" id="balance">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button><br>
      </div>
      <div class="modal-body">
      <div id="PrintBalance"></div>
       
      </div>
      <div class="modal-footer">
       
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->	
	
    
       

  

                    

            

        
       

<script>
function BalanceFees(id)
  {
     $.post("<?php echo base_url()?>Fees/NewEntry/"+id,
    function(data){
    
   $("#PrintBalance").html(data);

   });
  }

  
  function DeleteFees(id){
   
    alertify.confirm("Sure You Want To Delete This.",function(){
      $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Fees/DropFees/"+id,
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

function FeesHistory(id){
    

 
   $.post("<?php echo base_url()?>Fees/DetailFeesHistory/"+id,
    function(data){
    
   $("#print").html(data);

   });
   
 }

 function Invioce(id)
  {

      $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Fees/PrintInvoice/"+id,
      success: function(){
       
      }
  });
   
  }
</script>


