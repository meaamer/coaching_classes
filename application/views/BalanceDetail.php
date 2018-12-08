<?php 
     $date = null;
     $debit = null;
     $TotalDebit = 0;
     $TotalCredit = 0;
     foreach ($list_item as $fees) {
        $date = $fees['date'];
        $debit = $fees['debit'];
        $TotalDebit += $fees['debit'];
        $TotalCredit += $fees['credit'];
       
     }

      ?>



          <div class="form-group">
          <label for="exampleInputPassword1">Student Name</label>
          <input type="text" class="form-control" id=""  value="<?php echo $student_info['std_full_name'] ?>" readonly="readonly">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Course Name</label>
          <input type="text" class="form-control" id=""  value="<?php echo $student_info['std_course'] ?>" readonly="readonly">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Total Amount</label>
          <input type="text" class="form-control" id=""  value="<?php echo $student_info['std_fees'] ?>" readonly="readonly">
        </div>
        <form id="send">
  				<div class="form-group">
    				<label for="exampleInputEmail1">Balance Amount</label>
    				<input type="text" class="form-control" name="credit_fees" id="creadit" 
            value="<?php echo $TotalCredit - $TotalDebit ?>" readonly="readonly"> 
  			 </div>
        
  			<div class="form-group">
    			<label for="exampleInputPassword1">Recieve Amount</label>
    			<input type="text"  class="form-control" name="debit_fees" id="debit"  onkeyup="substract(<?php echo $TotalCredit-$TotalDebit ?>)">
  			</div>
  
 
    <button type="button" class="btn btn-default"  onclick="AddFees(<?php echo $student_info['std_id'] ?>);">Submit</button>
    <div id="alerts"></div>
</form>

















<script>
  function substract(value)
  {
     var creadit = $("#creadit").val();
     var debit = $("#debit").val();
     var result =value-debit;
      $("#creadit").val(result);
  }


function AddFees(id)
{
    var form =$("#send");
    $.ajax({
      type:"POST",
      url:"<?php echo base_url()?>Fees/InsertFees/"+id,
      data:form.serialize(),
      success: function(response){
        $("#alerts").html(response);
        form[0].reset();
      }
    });
}

</script>