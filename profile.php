
<?php

session_start();
if(!isset($_SESSION["uid"])){
	header("location:index.php");

}

?>


		<!DOCTYPE html>
		<html dir="ltr" lang="en-US">
		<head>
		<meta charset="UTF-8" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="initial-scale=1, maximum-scale=1" />
		<meta name="viewport" content="width=device-width" />


		<title>E-commerce</title>
		<link rel="stylesheet" href="css/bootstrap.min.css"/>
		<script src="js/jquery2.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<script src="main.js"></script>
	
		<style>
			@media screen and (max-width:480px){
				#search{width:80%;}
				#search_btn{width:30%;float:right;margin-top:-32px;margin-right:10px;}
			}
		</style>
	</head>
 <script type="text/javascript">
   //-->form field validation echo-->nel
   function nel(){
    var purpose = document.getElementById ("password");
    if(purpose.value.length < 8) {
      alert("Password is weak atleast character 8 character long!");
      return false;
    }
    return true;*/
}
  </script>
<body>

	<div class="navbar navbar-inverse navbar-fixed-top" style="background-color: #001a1a">
		<div class="container-fluid">	
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse" aria-expanded="false">
					<span class="sr-only"> navigation toggle</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand">Jonel Store</a>
			</div>
		<div class="collapse navbar-collapse" id="collapse">
			<ul class="nav navbar-nav">
				<li><a href="index.php"><span class="glyphicon glyphicon-home"></span>Home</a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<li><a href="#"></a></li>
				<!--<li><a href="feedback.php"><span class="glyphicon glyphicon-envelope"></span>Feedback</a></li>-->
				<li style="width:300px;left:10px;top:10px;"><input type="text" class="form-control" id="search" placeholder="Search Product."></li>
				<li style="top:10px;left:20px;"><button class="btn btn-primary" id="search_btn"><span class="glyphicon glyphicon-search"></span></button></li>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="#" id="cart_container" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-shopping-cart"></span>Cart&nbsp;<span class="badge badge-important" style="background-color:#9fbfdf;color:red">0</span><span class="caret"></span></a>
					<div class="dropdown-menu" style="width:400px;">
						<div class="panel panel-success">
							<div class="panel-heading">
								<div class="row">
									<div class="col-md-3 col-xs-3">Sl.No</div>
									<div class="col-md-3 col-xs-3">Product Image</div>
									<div class="col-md-3 col-xs-3">Product Name</div>
									<div class="col-md-3 col-xs-3">Price in Php</div>
								</div>
							</div>
							<div class="panel-body">
								<div id="cart_product">
								<!--<div class="row">
									<div class="col-md-3">Sl.No</div>
									<div class="col-md-3">Product Image</div>
									<div class="col-md-3">Product Name</div>
									<div class="col-md-3">Price in P.</div>
								</div>-->
								</div>
							</div>
							<div class="panel-footer"></div>
						</div>
					</div>
				</li>
				<li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span><?php echo "Hi,".$_SESSION["name"]; ?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="cart.php" style="text-decoration:none; color:blue;"><span class="glyphicon glyphicon-shopping-cart">&nbsp;Cart</a></li>
						<!--<li class="divider"></li>
						<li><a href="feedback.php" data-toggle="modal" data-target="#signupModal" style="text-decoration:none; color:blue;"><span class="glyphicon glyphicon-envelope"></span> &nbsp;Feedback</a></li>-->
						<?php					 
								include "jt_ecommerce/connect.php";
                                 
									$query=mysqli_query($con,"select * from user_info")or die(mysqli_error());  
									$row=mysqli_fetch_array($query);
						            $user_id=$row['user_id'];
							?> 
						<li class="divider"></li>
						<li><a href="#update<?php echo $user_id;?>"  data-target="#update<?php echo $user_id;?>" data-toggle="modal" style="text-decoration:none; color:blue;"><span class="glyphicon glyphicon-user"></span> &nbsp;Change Password</a></li>
						
						<li class="divider"></li>
						<li><a href="logout.php" style="text-decoration:none; color:blue;"><i class = "glyphicon glyphicon-off"></i> &nbsp;Logout</a></li>
					</ul>
				</li>
				
			</ul>
		</div>
	</div>
	</div>
<div class="well" style="background-color:#ff3333"><font color="#ff3333">1</font></div>
	<p><br/></p>
	<p><br/></p>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-2">
				<div id="get_category" style="background-color:#ccffcc;border-radius:4px; box-shadow:3px 3px 2px 2px;">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Categories</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
				<div id="get_brand" style="background-color:#ccffcc;border-radius:4px; box-shadow:3px 3px 2px 2px;">
				</div>
				<!--<div class="nav nav-pills nav-stacked">
					<li class="active"><a href="#"><h4>Brand</h4></a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
					<li><a href="#">Categories</a></li>
				</div> -->
			</div>
			<div class="col-md-8">	
				<div class="row">
					<div class="col-md-12 col-xs-12" id="product_msg">
					</div>
				</div>
				<div class="panel panel-primary" id="scroll">
					<div class="panel-heading">Select Products</div>
					<div class="panel-body">
						<div id="get_product">
							<!--Here we get product jquery Ajax Request-->
						</div>
						<!--<div class="col-md-4">
							<div class="panel panel-info">
								<div class="panel-heading">Samsung Galaxy</div>
								<div class="panel-body">
									<img src="../upload/images.JPG"/>
								</div>
								<div class="panel-heading">P.500.00
									<button style="float:right;" class="btn btn-danger btn-xs">AddToCart</button>
								</div>
							</div>
						</div> -->
					</div>
				
					<div class="panel-footer panel-danger" style="background-color:#ccffcc">Copyright &copy; 2018 All Right Reserved</div>
				</div>
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<center>
					<ul class="pagination" id="pageno">
						<li><a href="#">1</a></li>
					</ul>
				</center>
			</div>
		</div>
	</div>
	
</body>
</html>
	<?php

		include "jt_ecommerce/connect.php";

            
			$query=mysqli_query($con,"select * from user_info")or die(mysqli_error());  
			$row=mysqli_fetch_array($query);
			$user_id=$row['user_id'];
		

	?>  
    <div id = "update<?php echo $user_id;?>" class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog modal-md">
            <div class="modal-content">
              <div class="modal-header" style="background-color:#ccffff;">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Edit User Details</h4>
              </div>
                 <form method = "POST" action = "update_user.php" > 
				 <input type="hidden" name="user_id" value="<?php echo $row['user_id'];?>">
              <div class="modal-body" style="padding:40px 20px;">
                <form role="form">
                 <div class="col-md-6">
                  <label class="control-label" for="inputEmail">Current Password</label>
                	<div class="form-group">
                    	 <input type="password"  name="password" placeholder="New Password" class="form-control" value="<?php echo $row['password'];?>"  disabled = "disabled"/>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <label class="control-label" for="inputPassword">New Password</label>
                    <div class="form-group">
                    	<input type="password"  name="password" placeholder="New Password" class="form-control" value="" required />
                    </div>
                    </div>
                    <div class="form-group">
                    	<hr>
                    </div>
                      <div class="col-md-6 col-md-offset-9">
                    <div class="form-group">
                    	<button  name = "update" class="btn btn-primary" onclick="nel();">Save changes</button>
                     </div>
                    </div>
                    <br>
              
              </div>
            
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
               
              </div>
            </div>
          </div>
        </div>
		
    </div>
  </form>














































