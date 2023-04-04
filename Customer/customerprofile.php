<HTML>
<HEAD>
<?php
	  session_start();
	  include("csslink.php");
	  include("../class/DataClass.php");
	?>
	
<?php
    $regid="";
	$custname="";
	$address="";
	$cityid="";
	$mobileno="";
	$filename="";
	$tmpname="";
	$msg="";
	$query="";
    $dc=new dataclass();
  ?>
  
  <?php
  
   if(($_SESSION['regid'] == '') || (!isset($_SESSION['regid']))) 
   {
      $_SESSION['regid']=2;
	  $regid=2;
   }
     
	if(isset($_POST['btnupdate']))
	{
	      $regid=$_SESSION['regid'];
		  $custname=$_POST['txtcustname'];
		  $address=$_POST['txtaddress'];
		  $cityid=$_POST['lstcity'];
		  $mobileno=$_POST['txtmobileno'];	
		  $filename=$_FILES['fupload']['name'];
		  $tmpname=$_FILES['fupload']['tmp_name'];
		  
		  
		 $query="update customer set custname='$custname',address='$address',cityid='$cityid',mobileno='$mobileno',photo='$filename' where custid='$regid'";
		 echo($query); 
      	 $result=$dc->saveRecord($query);
	     if($result)
	     {
		   if(isset($_FILES['fupload']))
	        {
	          move_uploaded_file($tmpname,"customerimages/".$filename);
	        }
		   $msg="Profile update successfully";
		 }
	 }	 
	  
	
	
	if(isset($_POST['btncancel']))
	{
	   header('location:customerhome.php');
	}	
  ?> 
  
</head>
<body>
 
 <form name="frm" action="#" method="post" enctype="multipart/form-data">
<?php
 include("header.php");
?>

<div class="container"> 
	
	     <div class="row">
		
 	       <div class="col-md-1"></div>
               <div class="col-md-5"> 
			       <h3>customer PROFILE </h3>
			   </div>
			</div>   
	
  	  <div class="row">
		
 	       <div class="col-md-1"></div>
               <div class="col-md-5"> 
			   		      
		    <?php		  
				$regid=$_SESSION['regid'];
				$query="select * from customer where custid='$regid'";
				$rw=$dc->getRecord($query);
				if($rw)
				{
				  $custname=$rw["custname"];
				  $address=$rw["address"];
				  $cityid=$rw["cityid"];
				  $mobileno=$rw["mobileno"];
				  $filename=$rw["photo"];
	            }
			?> 
                          
				<div class="form-group">
                    <label>name</label><span style="color:red;font-size:25px">*</span>
                      <input type="text" class="form-control" name="txtcustname" value='<?php echo($custname) ?>' placeholder="Enter name" onchange='onlyalpha(this,lblname)'/>
 					   <label class='errmsg' id="lblname"></label>
                   </div>
				   
				   <div class="form-group">
                    <label>address</label><span style="color:red;font-size:25px">*</span>
                      <input type="text" class="form-control" name="txtaddress" value='<?php echo($address) ?>' placeholder="Enter address" onchange='checkblank(this,lbladd)' />
					  <label class='errmsg' id="lbladd"></label>
                   </div>
				   
				   <div class="form-group">
                    <label>city Name</label><span style="color:red;font-size:25px">*</span>
                       <select name="lstcity" class="form-control">
					    <?php 
						  $tb=$dc->getTable("select cityid,cityname from city"); 
						  while($rw=mysqli_fetch_array($tb))
						  {
							if($cityid==$rw['cityid']) 
							 echo("<option selected value=".$rw['cityid'].">".$rw['cityname']."</option>");
							else
						 	 echo("<option value=".$rw['cityid'].">".$rw['cityname']."</option>");
						  }
					     ?>
					   </select>
					  
                   </div>
				   
				   <div class="form-group">
                    <label>mobileno</label><span style="color:red;font-size:25px">*</span>
                      <input type="text" class="form-control" name="txtmobileno" value='<?php echo($mobileno) ?>' placeholder="Enter mobileno" onchange='checklength(this,lblno,1,10)' />
					  <label class='errmsg' id="lblno"></label>
                   </div>
				   
				   				 
				 <div class="form-group">
                    <label>photo</label>
                      <input type="file" class="form-control" name="fupload">
                 </div>
				   				  
				   
				  <div class="form-group">
                       <input type="submit" class="btn btn-success" name="btnupdate" value="Update">
					   <input type="submit" class="btn btn-danger" name="btncancel" value="Cancel">
                   </div>
				   
				    <div class="form-group">
                       <label name="lblmsg"> <?php echo($msg) ?></label>
                   </div>
			   </div>
			   
              <div class="col-md-5"> 			   
			     <img src='<?php echo("customerimages/".$filename) ?>' style="width:100%;height:390px;padding:15px;border:2px solid navy"> 
			  </div>
			   
        </div>		
	 </div>
			 
   </section>
 
 <?php
   include("footer.php");	  
 ?>
 
</div>
</form>	
 
 <?php
 include("footer.php");
?>

<?php
 include("jslink.php");
?>
</BODY>
</HTML>
