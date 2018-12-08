<table class="table table-striped">
  <thead>
    <tr class="warning">
    <th>#</th>
    <th>Date</th>
    <th>Receive Amount</th>
    <th>Balance Amount  </th>
    <th>Invoice</th>
    </tr>
    </thead>
    <tbody>
                      


<?php

 	if (!empty($list)) 
 	{
 		foreach ($list as $list_item){ ?>
 		
 			
<tr>
  <td><?php  echo $list_item['fees_id'] ?></td>
  <td><?php  echo $list_item['date'] ?></td>
  <td><?php  echo $list_item['debit'] ?></td>
  <td><?php  echo $list_item['credit'] ?></td>
  <td>
  <?php $fees_id = $list_item['fees_id']; ?>
  <a href="<?php echo base_url('Fees/PrintInvoice/').$std_id.'/'.$fees_id; ?>" class="btn btn-danger btn-xs">Invoice</a>
  </td>
</tr>
 		
 	


	<?php } }?>
</tbody>
</table>  

 
   

<script> 
function Invioce(id)
  {

      $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Fees/PrintInvoice/"+id,
      success:function(data){
       // alert(data);
      }
      
  });
   
  }
</script>