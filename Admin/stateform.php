<HTML>
<HEAD>
<?php
	  session_start();
	  include("../class/DataClass.php");
	  include("csslink.php");
	?>
	<?php
	    $stateid="";
		$statename="";
		$shortname="";
		$msg="";
	    $dc=new DataClass();
	?>
		<?php
	
	  if($_SESSION["trans"]=="update")
	  {
	     $stateid=$_SESSION["id"]; 
		 $query="select * from state where stateid='$stateid'";
		 $rw=$dc->getRecord($query);
		 $stateid=$rw["stateid"];
		 $statename=$rw["statename"];
		 $shortname=$rw["shortname"];
	  }
	  if(isset($_POST["btnsave"]))
	  {
		 $statename=$_POST["txtstatename"]; 
		 $shortname=$_POST["txtshortname"];
		 
		 if($_SESSION["trans"]=="new") 
		 {
		  $query="insert into state(statename,shortname) values('$statename','$shortname')"; 
		 }
		 if($_SESSION["trans"]=="update") 
		 {
		  $stateid=$_SESSION["id"]; 	 
		  $query="update state set statename='$statename',shortname='$shortname' where stateid='$stateid'"; 
		 }
		 
		  $result=$dc->saveRecord($query);
		  if($result)
		  {
		     header("location:stateshow.php"); 
		  }
		  else
		  {
		    $msg="Record not saved...";
		  }
		 }
	   
	  
	  if(isset($_POST["btncancel"]))
	  {
		 header("location:stateshow.php");
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
		 <h3>STATE FORM
         	</h3>
		 </div>
		 </div>
		 <div class="row">
		   <div class="col-md-1"></div>
			<div class="col-md-10">

		<div class="form-group">
			<label>State Name</label>
			<input type="text" class="form-control" name="txtstatename" value="<?php echo($statename) ?>" placeholder="Enter state name" autofocus onChange='checkblank(this,lblstatename)'>
			<label id="lblstatename" class="errmsg"></label>
		</div>
			<div class="form-group">
			<label>shortname</label>
			<input type="text" class="form-control" name="txtshortname" value="<?php echo($shortname) ?>" placeholder="Enter shortname" onChange='checkblank(this,lblshortname)'>
			<label id="lblshortname" class="errmsg"></label>
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