
<?php 
        if($this->session->userdata('userid')=="")
        {
             redirect(base_url('Login'));
        }
 ?>

        
             
             
            
<!DOCTYPE HTML>
<html>
<head>
<title></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->

<link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href=" <?php echo base_url('assets/css/style.css'); ?>" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/icon-font.min.css'); ?>" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->
<script src="<?php //echo base_url('assets/js/Chart.js'); ?>?>"></script>
<!-- //chart -->
<!--animate-->
<link href="<?php echo base_url('assets/css/animate.css'); ?>" rel="stylesheet" type="text/css" media="all">


<script src="<?php echo base_url('assets/js/wow.min.js'); ?>"></script>
	<script>
		 // new WOW().init();
	</script>
<!--//end-animate-->

<link href='//fonts.googleapis.com/css?family=Cabin:400,400italic,500,500italic,600,600italic,700,700italic' rel='stylesheet' type='text/css'>
<!---//webfonts---> 
 <!-- Meters graphs 
<!--  -->

<!-- alertify css -->
<link href="<?php echo base_url('assets/alertify/css/alertify.css');?>" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url('assets/alertify/css/alertify.min.css');?>" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="<?php echo base_url('assets/alertify/css/themes/default.min.css');?>">


</head> 
   
 <body class="sticky-header left-side-collapsed"  onload="">
    <section>
    <!-- left side start-->
		
    <!-- left side end-->
    
    <!-- main content start-->
		<div class="main-content main-content4">
			<!-- header-starts -->
			<div class="header-section">
			 
			<!--toggle button start-->
			<a class="toggle-btn  menu-collapsed"><i class="fa fa-bars"></i></a>
			<!--toggle button end-->

			<!--notification menu start -->
			<div class="menu-right">
				<div class="user-panel-top">  	
					<div class="profile_details_left">
						
					</div>
					<div class="profile_details">		
						<ul>
							<li class="dropdown profile_details_drop">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
									<div class="profile_img">	
										<span style="background:url(<?php echo base_url('assets/images/1.jpg'); ?>) no-repeat center"> </span> 
										 <div class="user-name">
											<p><?php ?><span>Administrator</span></p>
										 </div>
										
										<div class="clearfix"></div>	
									</div>	
								</a>
								
							</li>
							<div class="clearfix"> </div>
						</ul>
					</div>		
						             	
					<div class="clearfix"></div>
				</div>
			</div>
			<!--notification menu end -->
			</div>