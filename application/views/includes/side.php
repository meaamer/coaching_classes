<div class="left-side sticky-left-side">

			<!--logo and iconic logo start-->
			<div class="logo">
				<h1><a href="<?php echo base_url('Dashboard'); ?>"><?php echo $this->session->userdata('admin_name'); ?> <span>Admin</span></a></h1>
			</div>
			<div class="logo-icon text-center">
				<a href="<?php echo base_url('Dashboard'); ?>"><i class="lnr lnr-home"></i> </a>
			</div>

			<!--logo and iconic logo end-->
			<div class="left-side-inner">

				<!--sidebar nav start-->
					<ul class="nav nav-pills nav-stacked custom-nav">
						<li><a href="<?php echo base_url('Student/StudentList'); ?>">
						<i class="fa fa-user-plus"></i><span> New Students</span></a></li>

						<li><a href="<?php echo base_url('Student/ActiveStudent'); ?>">
						<i class="fa fa-users"></i><span>Active Student</span></a></li>

						<li><a href="<?php echo base_url('Fees/FeesList'); ?>"><i class="fa fa-calculator"></i><span>Fees</span></a></li>
						
						<li><a href="http://localhost/Coaching_classes/Exams/Course/CourseList"><i class="fa fa-book"></i><span>Course</span></a></li>
						
						<li><a href="<?php echo base_url('City/CityList'); ?>"><i class="fa fa-building-o"></i><span>City</span></a></li>
						
						<li><a href="<?php echo base_url('State/StateList'); ?>"><i class="fa fa-car"></i></i><span>State</span></a></li>

						

						<li><a href="<?php echo base_url('Login/Logout');?>"></i><i class="fa fa-sign-out"></i><span>Logout</span></a></li>
						             

						
						
					</ul>
				<!--sidebar nav end-->
			</div>
		</div>