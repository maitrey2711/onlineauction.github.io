<HTML>
<HEAD>
<?php
	  session_start();
	  include("../class/DataClass.php");
	  include("csslink.php");
	?>
	
 <?php
	  $regid="";
	  $regdate="";
	  $username="";
	  $password="";
	  $usertype="";
	  $contactno="";
	  $emailid="";
	  $msg="";
	  $dc=new dataclass();
	 ?>
	 
	 
	 <?php
	     if(isset($_POST["btnsubmit"]))
		 {
		    $regid=$dc->primary("select max(regid) from register");
		    $regdate=date('y-m-d');
			$username=$_POST["txtusername"];
			$password=$_POST["txtpassword"];
			$usertype=$_POST["lstusertype"];
			$contactno=$_POST["txtcontactno"];
			$emailid=$_POST["txtemailid"];
			$query="insert  into register(regid,regdate,username,password,usertype,contactno,emailid) values ('$regid','$regdate','$username','$password','$usertype','$contactno','$emailid')";
			echo($query);
			$result=$dc->saverecord($query);
			if($result)
			{
			 if($usertype=="Customer")
		      {
		       $query="insert into customer(custid,custname) values('$regid','$username')";
		     }
			 if($usertype=="Owner")
		      {
		       $query="insert into owner(ownerid,ownername) values('$regid','$username')";
		     }
				
		     $dc->saveRecord($query);
			 $msg="register successfully";
			}
			else
			{
			 $msg="user not registered";
		}
	}
	?>
			
</HEAD>
<HTML>
<BODY>
<div id="wrapper">
  <?php
   include("header.php");
  
  ?>
  <form name="frm" action="#" method="post">
    <div class="container-fluid" style="background-image:url('img/background1.jpg')">
   	<div class="row">
		    <div class="col-md-3"></div>   
			<div class="col-md-6"> <h3>User Registration</h3> </div>
		</div>
		
		<div class="row">
		    <div class="col-md-3"></div>   
			<div class="col-md-6">
             <div class="form-group">
               <label>User Name</label>
			    <input type="text"  name="txtusername" class="form-control" placeholder="Enter User Name" onChange='checkblank(this,lblusername)'/>
		        <label id="lblusername" class="errmsg"></label>
	         </div> 			
			 
			 <div class="form-group">
			    <label>Password</label>
			    <input type="password" name="txtpassword" class="form-control" placeholder="Enter Password" onChange='checkrange(this,lblpassword,6,10)' />
		        <label id="lblpassword" class="errmsg"></label>
	         </div> 			
			 
			 <div class="form-group">
                <label>Contact No</label>
			    <input type="text" name="txtcontactno" class="form-control" placeholder="Enter Contact Number" onChange='onlynumber(this,lblcontactno)'/>
		        <label id="lblcontactno" class="errmsg"></label>
	         </div>
			 
			 <div class="form-group">
			     <label>Email Address</label>
			    <input type="text" name="txtemailid" class="form-control" placeholder="Enter Email ID" onChange='checkemail(this,lblemailid)' />
		         <label id="lblemailid" class="errmsg"></label>
	         </div>
			 
			 <div class="form-group">
               <div class="controls">
			     <label>User Type</label>
				  <select name="lstusertype" class="form-control" onChange='checkblank(this,lblemailid)' > 
				    <option>Owner</option>
					<option>Customer</option>
				  </select>
			      <label id="lblusertype" class="errmsg"></label>
		       </div>
	         </div>
			 <div class="form-group" style="margin-top:10px">
                 <input type="submit" class="btn" name="btnsubmit" value="Submit"> 
				 <input type="submit" class="btn" name="btncancel" value="Cancel"> 
			 </div>
			 <div class="control-group">
			 <div class="controls">
			     <label> <?php echo($msg) ?> </label>
			  </div>
			 </div>
			 
			 
  	      </div>
		</div>
	 </div>	
		
	 
  </form>
  <?php
   include("footer.php");
   
  ?>
  
 </div> 
 <?php
 include("jslink.php");
?> 
</BODY>
</HTML>

	