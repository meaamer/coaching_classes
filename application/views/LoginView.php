
<!DOCTYPE HTML>
<html>
<head>
<title>Admin Panel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Easy Admin Panel Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
 <!-- Bootstrap Core CSS -->
 
<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel='stylesheet' type='text/css' />
<!-- Custom CSS -->
<link href="<?php echo base_url('assets/css/style.css');?>" rel='stylesheet' type='text/css' />
<!-- Graph CSS -->
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"> 
<!-- jQuery -->
<!-- lined-icons -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/icon-font.min.css'); ?>" type='text/css' />
<!-- //lined-icons -->
<!-- chart -->

<!-- //chart -->
<!--animate-->
<link href="<?php echo base_url('assets/css/animate.css'); ?>" rel="stylesheet" type="text/css" media="all">

	
<style>
	#submit{
    font-size: 1.1em;
    color: #fff;
    background: #00ACED;
    border: none;
    padding: 0.7em 1em 0.7em 1em;
    width: 88.5%;
    margin-top: 0.5em;
    display: block;
    outline: none;
    border-radius: 4px;
    cursor: pointer;
}
</style>


<!-- Placed js at the end of the document so the pages load faster -->

</head> 
   
 <body class="sign-in-up">
    <section>
			<div id="page-wrapper" class="sign-in-wrapper">
				<div class="graphs">
					<div class="sign-in-form">
						<div class="sign-in-form-top">
							<p><span>Login to</span> <a href="#">Admin</a></p>
						</div>
						<div class="signin">
							
							<form id="send">
							<div class="log-input">
								<div class="log-input-left">
								   <input type="text" class="user" name="username" placeholder="Username">
								</div>
								<span class="checkbox2">
									 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i></label>
								</span>
								<div class="clearfix"> </div>
							</div>
							<div class="log-input">
								<div class="log-input-left">
								   <input type="password" class="lock" name="password" placeholder="password">
								</div>
								<span class="checkbox2">
									 <label class="checkbox"><input type="checkbox" name="" checked=""><i> </i></label>
								</span>
								<div class="clearfix"> </div>
							</div>
							<input type="button" class="btn btn-primary" id="submit" value="Login to your account" onclick="userLog()">
							<div id="alert"></div>
						</form>	 
						</div>
						
					</div>
				</div>
			</div>
		<!--footer section start-->
			<footer>
			  
			</footer>
        <!--footer section end-->
	</section>
	<script src="<?php echo base_url('assets/js/jquery-1.10.2.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.nicescroll.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/scripts.js'); ?>"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
</body>
</html>

<script>
  function userLog()
  {
   	$.ajax({
   		type:'POST',
   		url:'<?php echo base_url('')?>Login/AdminLogin',
   		data:$("#send").serialize(),
   		success:function(response)
   		{
   			$("#alert").html(response);
   		}
   	});
  }
</script>