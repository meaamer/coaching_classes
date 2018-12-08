
   <div class="container">
        <?php if (!empty($list)) { foreach ($list as $item) {?>
  
            
              <div class="">
                <div class="col-md-12 col-lg-12 ">
                  <img alt="User Pic" src="<?php echo base_url($item['std_image']); ?>" class="img-responsive" height="200" width="150"> 
                </div>
                
               
                <div class="row"> 
                <div class="col-md-5">
                    <table  class="table table-user-information">
                      <tbody>

                     
                      <tr class="" >
                        <th>Full Name</th>
                        <td style="word-break: break-all;"><?php echo $item['std_full_name']; ?> </td>
                      </tr>

                      

                      <tr>
                        <th>Mother Name</th>
                        <td><?php echo $item['std_mother_name']; ?></td>
                      </tr>
                   
                      

                      <tr>
                        <th>Date of Birth</th>
                        <<td><?php echo $item['std_dob']; ?></td>
                      </tr>

                      <tr>
                        <th>Mobile NO</th>
                        <td><?php echo $item['std_mobile']; ?></td>
                      </tr>

                      <tr>
                        <th>Password</th>
                        <td><?php echo $item['std_password']; ?></td>
                      </tr>

                      <tr>
                        <th>Email</th>
                        <td><?php echo $item['std_email']; ?></td>
                      </tr>

                      <tr>
                        <th>Gender</th>
                        <td><?php echo $item['std_gender']; ?></td>
                      </tr>

                      </tbody>
                  </table>
                </div>      
                <div class="col-md-5">       
                     <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <th>Date of Addmission</th>
                        <td><?php echo $item['std_addmission_date']; ?></td>
                      </tr>
                     
                        
                      <tr>
                        <th>Course</th>
                        <td><?php echo $item['std_course']; ?></td>
                      </tr>

                      <tr>
                        <th>Sub Course</th>
                        <td><?php echo $item['std_sub_course']; ?></td>
                      </tr>
                      <tr>
                        <th>Course Fees</th>
                        <td><?php echo $item['std_fees']; ?></td>
                      </tr>
                       

                      <tr style="width:10%">
                        <th>Education</th>
                        <td><?php echo $item['std_education']; ?></td>
                      </tr>
                        
                     
                      <tr>
                        <th>Address</th>
                        <td><?php echo $item['std_address']; ?></td>
                      </tr>
                        
                      
                      <tr>
                        <th>City</th>
                        <td><?php echo $item['std_city']; ?></td>
                      </tr>
                        
                        
                      <tr>
                        <th>State</th>
                        <td><?php echo $item['std_state']; ?></td>
                      </tr>
                        
                           
                     
                    </tbody>
                  </table>
               </div>    
                  
                </div>

              </div>

              <?php } } ?>
           
                
            
         
       
      </div>
    
  


