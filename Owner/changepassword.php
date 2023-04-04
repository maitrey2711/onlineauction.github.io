<html>
 <head>
 <?php
   session_start();
   include("csslink.php");
   include("../class/DataClass.php");
 ?>
 
 <?php
   $regid="";
   $username="";
   $oldpwd="";
   $newpwd="";
   $msg="";
   $dc=new DataClass();
 ?>
 
 <?php
   if(isset($_POST['btnchange']))
   {
	 $regid= $_SESSION['regid']; 
     $username=$_POST['txtusername'];	 
     $oldpwd=$_POST['txtoldpwd'];
	 $newpwd=$_POST['txtnewpwd'];
	 $query="select password from register where regid='$regid'";
	 $rw=$dc->getRecord($query);
	 
	 if($rw)
	 {
	    if($oldpwd==$rw['password'])
        {
		  $query="update register set password='$newpwd' where regid='$regid'";
		  $result=$dc->saveRecord($query);
		  if($result)
		  {
		    $msg="Password Change Successfully";
		  }
		  else
		  {
		    $msg="Password not Changed";
		  }
		}
       else
	   {
	      $msg="Password not match";
	   }		   
	 }
   }
 ?>
 	<style type="text/css">
	 .form-control{padding:20px!important;width:100%!important}
	</style>
 </head>
 <body>
 <div id="wrapper">
 <form name="frm" action="#" method="post">
 <?php
   include("header.php");
 ?>
 
 <div class="container">
   <div class="row">
     <div class="col-md-3"></div>
	 <div class="col-md-6">
	 
   <div class="control-group">
    <h3 style="text-align:center">CHANGE PASSWORD</h3>
  </div>
   <div class="control-group">
     <label>USER NAME </label> 
	 <input type="text" name="txtusername" class="form-control" placeholder="User Name" value=<?php echo("$username") ?> > 
   </div>

   <div class="control-group">
     <label>OLD PASSWORD </label> 
	 <input type="password" name="txtoldpwd" class="form-control" /> 
   </div>
   
    <div class="control-group">
     <label>NEW PASSWORD </label> 
	 <input type="password" name="txtnewpwd" class="form-control" /> 
   </div>
      
   <div class="control-group" style="margin-top:10px">
    <button type="submit" class="btn btn-primary" name="btnchange">CHANGE</button>
	<button type="submit" class="btn btn-primary" name="btncancel">CANCEL</button>
   </div>
   
   <div class="control-group">
      <label name="lblmsg"><?php echo($msg) ?> </label> 
   </div>
	  
  </div>
	 
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
   include("jslink.php");
 ?>
 </body>
</html>