<?php if (!empty($sorting)) { foreach ($sorting as $row){ ?>
	<tr>
		<td><?php echo $row['std_id']; ?></td>
		<td><img src="<?php echo base_url($row['std_image']); ?>" class="img-responsive" height="100" width="100"></td>
		<td><?php echo $row['std_full_name']; ?></td>
		<td><?php echo $row['std_mobile']; ?></td>
		<td><?php echo $row['std_course']; ?></td>
		<td><?php echo $row['std_sub_course']; ?></td>
		<td>
            <?php if($row['status']==0){
            echo '<button type="button" class="btn btn-danger btn-xs" 
          		onclick="Status('.$row['std_id'].',1);">Active</button></td>';
          	}else{
            echo '<button type="button" class="btn btn-danger btn-xs" 
          	onclick="Status('.$row['std_id'].',0);">Deactive</button></td>';
          	}
          	?>
        </td>
        <td> 
			<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#student_details" onclick="ViewItem(<?=$row['std_id']?>)"><i class="fa fa-plus-circle" aria-hidden="true" style="font-size:25px"></i></button>
			<button type="button" class="btn btn-danger btn-xs" onclick="DeleteStd(<?=$row['std_id']?>);"><i class="fa fa-trash-o" aria-hidden="true" style="font-size:25px"></i></button>

			<a class="btn btn-danger btn-xs" 
			href="<?=base_url('Student/ActiveStudent/').$row['std_id']?>"><i class="fa fa-pencil" aria-hidden="true" style="font-size:25px"></i></a>
		</td>
											
											
		
	</tr>
	
<?php } }?>


										
										
											
											
											
											
											
											
											
											
											

											
											