<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
	<style type="text/css">

	    body
	    {
	        background:#f2f2f2;
	    }

	    .payment
		{
			border:1px solid #f2f2f2;
			/*height:280px;*/
	        border-radius:20px;
	        background:#fff;
		}
	   .payment_header
	   {
		   background:rgba(255,102,0,1);
		   padding:20px;
	       border-radius:20px 20px 0px 0px;
		   
	   }
	   
	   .check
	   {
		   margin:0px auto;
		   width:50px;
		   height:50px;
		   border-radius:100%;
		   background:#fff;
		   text-align:center;
	   }
	   
	   .check i
	   {
		   vertical-align:middle;
		   line-height:50px;
		   font-size:30px;
	   }

	    .content 
	    {
	        text-align:center;
	    }

	    .content  h1
	    {
	        font-size:25px;
	        padding-top:25px;
	    }

	    .content a
	    {
	        width:200px;
	        height:35px;
	        color:#fff;
	        border-radius:30px;
	        padding:5px 10px;
	        background:rgba(255,102,0,1);
	        transition:all ease-in-out 0.3s;
	    }

	    .content a:hover
	    {
	        text-decoration:none;
	        background:#000;
	    }
	   
	</style>
</head>
<body ng-app="myApp">
	<div class="container">
	   <div class="row">
	      <div class="col-md-6 mx-auto mt-5">
	         <div class="payment">
	            <div class="payment_header bg-success mb-3">

	               <div class="check d-flex align-items-center justify-content-center"><i class="fa  fa-exclamation-circle" aria-hidden="true"></i></div>
	            </div>
	            <div class="content pr-3 pl-3" ng-init='message=<?php echo json_encode($message)?>'>
	               <div ng-show="{{message.success.length ? 'true' : ''}}" ng-repeat="msg in message.success" class="alert alert-success" role="alert">
	                 {{msg}}
	                 <i class="fa fa-check" aria-hidden="true"></i>

	               </div>
	               <div ng-show="{{message.error.length ? 'true' : ''}}" ng-repeat="msg in message.error" class="alert alert-danger" role="alert">
	                 {{msg}}
	                 <i class="fa fa-exclamation" aria-hidden="true"></i>

	               </div>
	               <a href="javascript:history.back()" class="bg-success">Trở về trước</a>
	            </div>
	            
	         </div>
	      </div>
	   </div>
	</div>

</body>
<script type="text/javascript" src="<?php echo base_url() ?>vendor/jquery-3.5.1.min.js"></script>  
<script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-1.5.min.js"></script>  
<script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-route.min.js"></script>  
<script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-animate.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-aria.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-messages.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>vendor/angular-material.min.js"></script>
<script type="text/javascript" src="<?php echo base_url() ?>vendor/md5.js"></script> 
<script type="text/javascript" src="<?php echo base_url(); ?>vendor/angular-1.5-cookies.min.js"></script> 
<!-- initialize page scripts -->
<script src="<?php echo base_url(); ?>/milestone/scripts/ui/notifications.js"></script>
<!-- end initialize page scripts -->
<script type="text/javascript" src="<?php echo base_url() ?>1.js"></script>
</html>