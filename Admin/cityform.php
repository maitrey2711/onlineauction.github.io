<HTML>
<HEAD>
<?php
	  session_start();
	  include("../class/DataClass.php");
	  include("csslink.php");
	?>
	<?php
	    $cityid="";
		$cityname="";
		$shortname="";
		$stateid="";
		$msg="";
	    $dc=new DataClass();
	?>
		<?php
	
	  if($_SESSION["trans"]=="update")
	  {
	     $cityid=$_SESSION["id"]; 
		 $query="select * from city where cityid='$cityid'";
		 $rw=$dc->getRecord($query);
		 $cityid=$rw["cityid"];
		 $cityname=$rw["cityname"];
		 $shortname=$rw["shortname"];
		 $stateid=$rw["stateid"];
	  }
	  if(isset($_POST["btnsave"]))
	  {
		 $cityname=$_POST["txtcityname"]; 
		 $shortname=$_POST["txtshortname"];
		 $stateid=$_POST["txtstateid"];
		 
		 if($_SESSION["trans"]=="new") 
		 {
		  $query="insert into city(cityname,shortname,stateid) values('$cityname','$shortname','$stateid')"; 
		 }
		 if($_SESSION["trans"]=="update") 
		 {
		  $prdid=$_SESSION["id"]; 	 
		  $query="update city set cityname='$cityname',shortname='$shortname',stateid='$stateid' where cityid='$cityid'"; 
		 }
		 
		  $result=$dc->saveRecord($query);
		  if($result)
		  {
		     header("location:cityshow.php"); 
		  }
		  else
		  {
		    $msg="Record not saved...";
		  }
		 }
	   
	  
	  if(isset($_POST["btncancel"]))
	  {
		 header("location:cityshow.php");
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
		 <h3>CITY FORM
         	</h3>
		 </div>
		 </div>
		 <div class="row">
		   <div class="col-md-1"></div>
			<div class="col-md-10">

		<div class="form-group">
			<label>city Name</label>
			<input type="text" class="form-control" name="txtcityname" value="<?php echo($cityname) ?>" placeholder="Enter city name" autofocus onChange='checkblank(this,lblcityname)'>
			<label id="lblcityname" class="errmsg"></label>
		</div>
			<div class="form-group">
			<label>shortname</label>
			<input type="text" class="form-control" name="txtshortname" value="<?php echo($shortname) ?>" placeholder="Enter shortname" onChange='checkblank(this,lblshortname)'>
			<label id="lblshortname" class="errmsg"></label>
		</div>
		<div class="form-group">
			<label>stateid</label>
			<input type="text" class="form-control" name="txtstateid" value="<?php echo($stateid) ?>" placeholder="Enter stateid" onChange='onlynumber(this,lblstateid)'>
		    <label id="lblstateid" class="errmsg"></label>
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