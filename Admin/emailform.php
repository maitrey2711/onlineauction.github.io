<HTML>
<HEAD>
<?php
	  session_start();
	  include("../class/DataClass.php");
	  include("csslink.php");
	?>
	
	<?php
	    $emailid="";
		$emaildate="";
		$emailfrom="";
		$emailto="";
		$subject="";
		$description="";
		$msg="";
	    $dc=new DataClass();
	?>
		
		<?php
	
	  if($_SESSION['trans']=="update")
	  {
	     $emailid=$_SESSION["id"]; 
		 $query="select * from email where emailid='$emailid'";
		 $rw=$dc->getRecord($query);
		 $emailfrom=$rw["emailfrom"];
		 $emailto=$rw["emailto"];
		 $subject=$rw["subject"];
		 $description=$rw["description"];
	  }
	  if(isset($_POST["btnsave"]))
	  {
		 $emaildate=date('y-m-d'); 
		 $emailfrom=$_POST["txtemailfrom"];
		 $emailto=$_POST["txtemailto"];
		 $subject=$_POST["txtsubject"];
		 $description=$_POST["txtdescription"];
		 if($_SESSION["trans"]=="new") 
		 {
		  $query="insert into email(emaildate,emailfrom,emailto,subject,description) values('$emaildate','$emailfrom','$emailto','$subject','$description')"; 
		  echo($query);
		 }
		 if($_SESSION["trans"]=="update") 
		 {
		  $messageid=$_SESSION["id"]; 	 
		  $query="update email set emailfrom='$emailfrpm',emailto='$emailto',subject='$subject',description='$description' where emailid='$emailid'"; 
		 }
		 
		  $result=$dc->saveRecord($query);
		  if($result)
		  {
		     header("location:emailshow.php"); 
		  }
		  else
		  {
		    $msg="Record not saved...";
		  }
		 }
	   
	  
	  if(isset($_POST["btncancel"]))
	  {
		 header("location:emailshow.php");
	  }
	?>
</HEAD>
<BODY class="fixed-nav sticky-footer bg-dark" id="page-top">
<form name="frm" action="#" method="post">
 
 <?php
 include("navbar.php");
?>

<div class="content-wrapper">
    <div class="container-fluid">
        <div class="row">
		<div class="col-xl-12">
		 <h3>EMAIL FORM
         	</h3>
		 </div>
		 </div>
		 <div class="row">
		   <div class="col-md-1"></div>
			<div class="col-md-10">

		<div class="form-group">
			<label>email from</label>
			<input type="text" class="form-control" name="txtemailfrom" value="<?php echo($emailfrom) ?>" placeholder="Enter emailfrom" onChange='checkemail(this,lblemailfrom)'>
			<label id="lblemailfrom" class="errmsg"></label>
		</div>
		<div class="form-group">
			<label>email to</label>
			<input type="text" class="form-control" name="txtemailto" value="<?php echo($emailto) ?>" placeholder="Enter emailto" onChange='checkemail(this,lblemailto)'>
			<label id="lblemailto" class="errmsg"></label>
		</div>
		<div class="form-group">
			<label>subject</label>
			<input type="text" class="form-control" name="txtsubject" value="<?php echo($subject) ?>" placeholder="Enter subject" onChange='checkblank(this,lblsubject)'>
			<label id="lblsubject" class="errmsg"></label>
		</div>
		<div class="form-group">
			<label>description</label>
			<input type="text" class="form-control" name="txtdescription" value="<?php echo($description) ?>" placeholder="Enter description" onChange='checkblank(this,lbldescription)'>
			<label id="lbldescription" class="errmsg"></label>
		</div>
		<div class="form-group">
			<input type="submit" class="btn btn-success" name="btnsave" value="SAVE">
			<input type="submit" class="btn btn-danger" name="btncancel" value="CANCEL">
		</div>
		
		</div>
	</div>
	</div>
	<?php
 include("footer.php");
?>
</div>	
	
</form>
<?php
 include("jslink.php");
?>
</BODY>
</HTML>