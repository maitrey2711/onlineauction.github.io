<HTML>
<HEAD>
<?php
	  session_start();
	  include("../class/DataClass.php");
	  include("csslink.php");
	?>
	<?php
	    $messageid="";
		$messagedate="";
		$message="";
		$mobileno="";
		$msg="";
	    $dc=new DataClass();
	?>
		<?php
	
	  if($_SESSION['trans']=="update")
	  {
	     $messageid=$_SESSION["id"]; 
		 $query="select * from message where messageid='$messageid'";
		 $rw=$dc->getRecord($query);
		 $message=$rw["message"];
		 $mobileno=$rw["mobileno"];
		
	  }
	  if(isset($_POST["btnsave"]))
	  {
		 $messagedate=date('y-m-d'); 
		 $message=$_POST["txtmessage"];
		 $mobileno=$_POST["txtmobileno"];
		
		 
		 if($_SESSION["trans"]=="new") 
		 {
		  $query="insert into message(messagedate,message,mobileno) values('$messagedate','$message','$mobileno')"; 
		  echo($query);
		 }
		 if($_SESSION["trans"]=="update") 
		 {
		  $messageid=$_SESSION["id"]; 	 
		  $query="update message set messagedate='$messagedate',message='$message',mobileno='$mobileno' where messageid='$messageid'"; 
		 }
		 
		  $result=$dc->saveRecord($query);
		  if($result)
		  {
		     header("location:messageshow.php"); 
		  }
		  else
		  {
		    $msg="Record not saved...";
		  }
		 }
	   
	  
	  if(isset($_POST["btncancel"]))
	  {
		 header("location:messageshow.php");
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
		 <h3>MESSAGE FORM
         	</h3>
		 </div>
		 </div>
		 <div class="row">
		   <div class="col-md-1"></div>
			<div class="col-md-10">

		<div class="form-group">
			<label>message</label>
			<input type="text" class="form-control" name="txtmessage" value="<?php echo($message) ?>" placeholder="Enter message" onChange='checkblank(this,lblmessage)'>
			<label id="lblmessage" class="errmsg"></label>
		</div>
		<div class="form-group">
			<label>mobileno</label>
			<input type="text" class="form-control" name="txtmobileno" value="<?php echo($mobileno) ?>" placeholder="Enter mobileno" onChange='onlynumber(this,lblmobileno)'>
			<label id="lblmobileno" class="errmsg"></label>
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