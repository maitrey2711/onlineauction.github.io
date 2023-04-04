<HTML>
<head>

  <?
    session_start();
	include("cssfiles.php");
	include("../class/Dataclass.php");
  ?>
  
  <?
    $username="";
	$password="";
	$emailid="";
	$msg="";
	$dc=new Dataclass();
  ?>
  
  <?
    if(isset($_POST['btnsubmit']))
	{
	  $username=$_POST['txtusername'];
	  $emailid=$_POST['txtemail'];
	  $query="select password from register where username='$username' and emailid='$emailid'";
	  $rw=$dc->getRecord($query);
	  if($rw)
	  {
		  $password=$rw['password'];
	  }
	  else
	  {
		 $msg="user name or emailid invalid";
	  }	  
	}
  ?>
  
 </head>
 <body>
   <form name="frm" action="#" method="POST">
   <div id="wrapper">
   <?
      include("navbar.php");
   ?>
   
   <div id="container">
	   <div class="row"style="margin-bottom:10px">
		   <div class="span3"></div>
			<div class="span6">
	
	<div class="control-group">
   <h3 style="text-align:center">Forgot Password</h3>
 </div>
   <div class="control-group">
     <label>User Name </label> 
	 <input type="text" name="txtuname" class="form-control" placeholder="User Name" /> 
   </div>
   <div class="control-group">
     <label>Email Address </label> 
	 <input type="text" name="txtemail" class="form-control" placeholder="Enter Email Address" /> 
   </div>
   
   <div class="control-group">
     <label>Show Password </label> 
	 <label name="lblpassword"><?php echo($password) ?> </label> 
   </div>
      
      
   <div class="control-group" style="margin-top:10px">
    <button type="submit" class="btn btn-primary" name="btnsubmit">Submit</button>
	<button type="submit" class="btn btn-primary" name="btncancel">Cancel</button>
   </div>
   
   <div class="control-group">
      <label name="lblmsg"><?php echo($msg) ?> </label> 
   </div>
   
   </div> 	
 
	</div>
  </div>


   <?php
     include("footer.php");
   ?>
   </div>

 </form>
 </div>
 <?php
   include("jsfiles.php");
 ?>
 </body>
</html>
   
   
   
   
   
   
   
   
   
   
   
   
   
   
   