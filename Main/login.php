<HTML>
  <HEAD>
   <?php
	  session_start();
	  include("../class/DataClass.php");
	  include("csslink.php");
	?>
	
	<?php
	  $regid="";
	  $username="";
	  $password="";
	  $usertype="";
	  $msg="";
	  $dc=new DataClass();
	?>
	
	<?php
	  if(isset($_POST["btnlogin"]))
	  {
		  $username=$_POST['txtusername'];
		  $password=$_POST['txtpassword'];
		  
		  $query="select  regid,username,password,usertype from register where username='$username'";
		  $rw= $dc->getRecord($query);
		  if($rw)
		  {
		      $_SESSION['regid']=$rw['regid'];
			  $_SESSION['username']=$rw['username'];
			  if($password==$rw['password'])
			  {
			     if($rw['usertype']=="Admin")
				 {
				   header("location:../Admin/adminhome.php");  
				 }
				 if($rw['usertype']=="Customer")
				 {
				   header("location:../Customer/customerhome.php");  
				 }
				 if($rw['usertype']=="Owner")
				 {
				   header("location:../Owner/ownerhome.php");  
				 }
				 
			  }				  
			  else
			  {
			    $msg="Invalid Password... ";
			  }
		  }
		  else
		  {
		    $msg="Invalid User... ";
		  }
	  }
	 ?>
	
		<style type="text/css">
	 .form-control{padding:20px!important;width:100%!important}
	</style>
  </HEAD>
  
  <BODY>
  <div id="wrapper">
  <?php
   include("header.php");
   ?>
   <form name="frm" action="#" method="post"> 
    
	<div class="container-fluid" style="background-image:url('img/background1.jpg')">
	   	<div class="row" style="margin-top:30px">
		    <div class="col-md-3"></div>   
			<div class="col-md-6">
			 <h3>User Login</h3>
		 </div>
		</div>
		
		<div class="row">
		    <div class="col-md-3"></div>   
			<div class="col-md-6">
             <div class="form-group">
               
			     <label>User Name</label>
			    <input type="text"  name="txtusername" class="form-control" placeholder="Enter User Name" />
		       
	         </div> 			
			 
			 <div class="form-group">
               
			     <label>Password</label>
			    <input type="password" name="txtpassword" class="form-control" placeholder="Enter Password" />
		      
	         </div> 			
			 
			 <div class="form-group" style="margin-top:15px">
             
			     <input type="submit" class="btn" name="btnlogin" value="Login"> 
				 <input type="submit" class="btn" name="btncancel" value="Cancel"> 
			  
			  </div>
			  
			  
			  
			</div>
		</div>
	 </div>	

  
   <?php
     include("footer.php");
	?>
  
  
   </form>
   <?php
	  include("jslink.php");
	?>
  </BODY>
</HTML>
	